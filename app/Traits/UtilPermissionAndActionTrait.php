<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait UtilPermissionAndActionTrait
{

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