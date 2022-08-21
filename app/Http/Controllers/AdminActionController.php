<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            $actionIds = $request->actions;
            $permission = $this->permission::find($permissionId);
            DB::enableQueryLog();
            $action = $this
                ->action
                ->firstOrNew(
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

            // $action
            //     ->permissions()
            //     ->attach($permissionId);

            dd(DB::getQueryLog());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Message: ' . $e->getMessage() . '----- Line: ' . $e->getLine());
        }

        return redirect()->route('admin.actions.index');
    }

    /**
     * Distinct grade
     */
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
}