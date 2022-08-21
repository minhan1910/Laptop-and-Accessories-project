<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminActionController extends Controller
{
    private $action;
    private $permission;

    public function __construct(Action $action, Permission $permission)
    {
        $this->action = $action;
        $this->permission = $permission;
    }

    public function index()
    {
        $actions = $this
            ->action::orderBy('created_at', 'DESC')
            ->paginate(4);

        $permisisonNamesForEachAction = $this
            ->getPermissionNamesForEachAction($actions);

        return view('admin.action.index', compact('actions', 'permisisonNamesForEachAction'));
    }

    public function create()
    {
        $permissions = $this
            ->permission::orderBy('created_at', 'DESC')
            ->paginate(4);

        $actionNamesForEachPermission = $this
            ->getActionNamesForEachPermission($permissions);

        return view('admin.action.add', compact('permissions', 'actionNamesForEachPermission'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $permissionId = $request->permission_id;
            $permission = $this->permission::find($permissionId);

            $action = $this
                ->action::firstOrCreate(
                    ['name' => $request->name],
                    [
                        'name' => $request->name,
                        'display_name' => $request->name,
                        'active' => 1,
                        'created_by' => Auth::user()->name
                    ]
                );

            $permission
                ->actions()
                ->attach($action->id);

            $msg = 'Add action successfully';
            $err = '';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $msg = 'Add action failed';
            $err = '';
        }

        return redirect()
            ->route('admin.actions.index')
            ->with('msg', $msg)
            ->with('err', $err);
    }

    public function selectPermisison(Request $request)
    {
        try {
            $permissionId = $request->get('permissionId');

            $permissison = $this
                ->permission::find($permissionId);

            $actionNamesForOnePermission = $this
                ->getActionNamesForOnePermission($permissison);

            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $actionNamesForOnePermission
            ], 200);
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }


    public function edit(Request $request, Action $action)
    {
        $permissions = $this
            ->permission::orderBy('created_at', 'DESC')
            ->paginate(4);

        $currentPermisisons = $this
            ->getPermissionNamesForOneAction($action);

        $currentPermissionsHtml = $this
            ->formatCurrentPermissions($currentPermisisons);

        $request
            ->session()
            ->put('actionId', $action->id);

        return view('admin.action.edit', compact('permissions', 'currentPermissionsHtml', 'action'));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $permissionId = $request->permission_id;

            $permission = $this
                ->permission::find($permissionId);

            $actionNamesForOnePermission = $this
                ->getActionNamesForOnePermission($permission);

            $existsActionInCurrentPermssion = $actionNamesForOnePermission[0]
                ->contains(function ($permission, $key) use ($request) {
                    return $permission->name === $request->name;
                });

            if (Session::has('actionId'))
                $actionId = Session::get('actionId');
            $action = $this
                ->action::find($actionId);

            // nếu cái action này < 1 thì update còn > 1 thì tách ra create 1 cái action mới
            $amountOfActionCurrents = $this
                ->countActionCurrent($actionId);

            if (
                /** 
                 * < 2 => chỉ có 1 thằng và 
                 *          cái action này 
                 *              nếu tồn tại trong action của permission
                 *                  -> update
                 *              else
                 *                  -> update 
                 *  vì nó chỉ có 1 :)
                 * 
                 * > 2 => trên nhiều perrmission có action này
                 *  -> phải create nếu nó ko nằm trong cái permisssion hiện tại
                 * -> else giữ nguyên
                 * */
                $amountOfActionCurrents[0]->count < 2
            ) {
                // update
                if ($existsActionInCurrentPermssion) {
                    $this
                        ->action
                        ::find($actionId)
                        ->update([
                            'name' => $request->name,
                            'display_name' => $request->display_name,
                            'updated_by' => Auth::user()->name,
                        ]);
                }
            } else {
                // Create
                if (!$existsActionInCurrentPermssion) {
                    /**
                     *  After deleting the action current 
                     *  Then creating new action
                     *  */
                    $permission
                        ->actions()
                        ->detach($action->id);

                    $newAction = $this
                        ->action
                        ->create([
                            'name' => $request->name,
                            'display_name' => $request->name,
                            'active' => 1,
                            'created_by' => Auth::user()->name
                        ]);
                    // Like add action_id into pivot table
                    $permission
                        ->actions()
                        ->attach($newAction->id);
                }
            }

            $msg = 'Edit action successfully !!';
            $error = null;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $msg = null;
            $error = 'Edit action failed !!';
        }

        return back()
            ->withInput()
            ->with('msg', $msg)
            ->with('error', $error);
    }

    public function getDelete(Request $request, Action $action)
    {
        $currentPermisisons = $this
            ->getPermissionNamesForOneAction($action);

        $currentPermissionsHtml = $this
            ->formatCurrentPermissions($currentPermisisons);

        $request
            ->session()
            ->put('actionId', $action->id);

        return view('admin.action.delete', compact('currentPermisisons', 'currentPermissionsHtml', 'action'));
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            $permissionId = $request->permission_id;

            $permission = $this
                ->permission::find($permissionId);

            if (Session::has('actionId'))
                $actionId = Session::get('actionId');

            $amountOfActionCurrents = $this
                ->countActionCurrent($actionId);

            if ($amountOfActionCurrents[0]->count < 2) {
                // Delete permanently 
                $permission
                    ->actions()
                    ->detach($actionId);

                $status = $this
                    ->action
                    ::find($actionId)
                    ->delete();
            } else {
                /**
                 * Just remove action_id in pivot table 
                 */
                $permission
                    ->actions()
                    ->detach($actionId);
            }

            $msg = 'Delete action successfully !!';
            $error = null;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
            $msg = null;
            $error = 'Delete action failed !!';
        }

        return redirect()
            ->route('admin.actions.index')
            ->with('msg', $msg)
            ->with('error', $error);
    }


    /** 
     * -------------------------------------------------------------------
     * Methods for handling logic like retrieve data, format data, ...
     */

    private function formatCurrentPermissions($currentPermissions)
    {
        $currentPermissionsHtml = '';
        $marked = '';
        foreach ($currentPermissions[0] as $currentPermission) {
            $currentPermissionsHtml .= "$marked$currentPermission->name";
            $marked = '/';
        }

        return $currentPermissionsHtml;
    }

    private function countActionCurrent($actionId)
    {
        $amountOfActionCurrents = DB::table('actions as a')
            ->leftJoin(
                'permission_actions as pa',
                'pa.action_id',
                '=',
                'a.id'
            )
            ->where('a.id', '=', $actionId)
            ->groupBy('pa.action_id')
            ->select(DB::raw('COUNT(*) as count'))
            ->get();
        return $amountOfActionCurrents;
    }

    /**
     * @todo This method retrieve and format permissions name
     *       exists from pivot (intermediate) table for each action.
     * 
     * @author Minh An Pham Duong
     * @since 20/8/2022
     * @return [
     *              'action_name' => [
     *                  'name' => 'permisison_name'
     *              ],
     *              ...
     *         ]
     */
    private function getPermissionNamesForEachAction($actions)
    {
        $permisisonNamesOfEachAction = [];
        foreach ($actions as $action) {
            $permissionNames = DB::table('permissions as p')
                ->whereExists(
                    fn ($query) =>
                    $query
                        ->select(DB::raw(1))
                        ->from('permission_actions as pa')
                        ->whereColumn('pa.permission_id', 'p.id')
                        ->where('action_id', '=', $action->id)
                        ->groupBy('pa.permission_id')
                )
                ->select('p.name')
                ->get();
            $permisisonNamesOfEachAction[$action->name] = $permissionNames;
        }

        return $permisisonNamesOfEachAction;
    }

    private function getActionNamesForEachPermission($permissions)
    {
        $actionNamesForEachPermission = [];
        foreach ($permissions as $permission) {
            $actionNames = DB::table('actions as a')
                ->whereExists(
                    fn ($query) =>
                    $query
                        ->select(DB::raw(1))
                        ->from('permission_actions as pa')
                        ->whereColumn('pa.action_id', '=', 'a.id')
                        ->where('permission_id', '=', $permission->id)
                        ->groupBy('pa.action_id')
                )
                ->select('a.name')
                ->get();
            $actionNamesForEachPermission[$permission->name] = $actionNames;
        }

        return $actionNamesForEachPermission;
    }

    private function getActionNamesForOnePermission($permission)
    {
        $actionNamesForOnePermission = [];

        $actionNames = DB::table('actions as a')
            ->whereExists(
                fn ($query) =>
                $query
                    ->select(DB::raw(1))
                    ->from('permission_actions as pa')
                    ->whereColumn('pa.action_id', '=', 'a.id')
                    ->where('permission_id', '=', $permission->id)
                    ->groupBy('pa.action_id')
            )
            ->select('a.name as name', 'a.id as id')
            ->get();
        $actionNamesForOnePermission[] = $actionNames;

        return $actionNamesForOnePermission;
    }

    private function getPermissionNamesForOneAction($action)
    {
        $permisionNamesForOneAction = [];

        $permisisonNames = DB::table('permissions as p')
            ->whereExists(
                fn ($query) =>
                $query
                    ->select(DB::raw(1))
                    ->from('permission_actions as pa')
                    ->whereColumn('pa.permission_id', '=', 'p.id')
                    ->where('action_id', '=', $action->id)
                    ->groupBy('pa.permission_id')
            )
            ->select('p.name as name', 'p.id as id')
            ->get();
        $permisionNamesForOneAction[] = $permisisonNames;

        return $permisionNamesForOneAction;
    }
}