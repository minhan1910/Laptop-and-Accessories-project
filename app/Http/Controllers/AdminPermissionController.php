<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\UtilPermissionAndActionTrait;
use Illuminate\Support\Facades\DB;

class AdminPermissionController extends Controller
{
    use UtilPermissionAndActionTrait;

    private $permission;
    private $action;

    public function __construct(
        Permission $permission,
        Action $action
    ) {
        $this->permission = $permission;
        $this->action = $action;
    }
    /**
     *  "user" => Illuminate\Support\Collection {#1462 ▼
    #items: array:5 [▼
      0 => {#1436 ▼
        +"name": "list"
      }
      1 => {#1220 ▼
        +"name": "create"
      }
      2 => {#1435 ▼
        +"name": "edit"
      }
      3 => {#1222 ▼
        +"name": "delete"
      }
      4 => {#1439 ▼
        +"name": "permission"
      }
    ]
     */
    public function create(Role $role)
    {
        $permissions = $this
            ->permission::all();

        // Cái này dùng để render thui còn cái chút nữa trong $roles->permisisons_encode
        // Này như cái roleListArr
        $actionNamesForEachPermission = $this
            ->getActionNamesForEachPermission($permissions);

        // Chút dùng cái $permisisons->permissions_encode để check liệu nó có nằm trong actionNamesForEachPermission khong
        $roleJson = $role->permissions_encode;

        if (!empty($roleJson)) {
            $rolePermisisons = json_decode($roleJson, true);
        } else {
            $rolePermisisons = [];
        }

        return view('admin.role.permission', compact(
            'permissions',
            'actionNamesForEachPermission',
            'role',
            'rolePermisisons'
        ));
    }

    public function store(Request $request, Role $role)
    {
        if (!empty($request->role)) {
            $roleArr = $request->role;
        } else {
            $roleArr = [];
        }

        $roleJson = json_encode($roleArr);

        $role->permissions_encode = $roleJson;
        $role->save();

        return back()->with('msg', 'Authorize successfully !!');
    }
}