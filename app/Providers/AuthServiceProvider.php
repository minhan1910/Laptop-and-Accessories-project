<?php

namespace App\Providers;

use App\Models\Action;
use App\Models\Permission;
use App\Models\User;
use App\Traits\UtilPermissionAndActionTrait;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    use UtilPermissionAndActionTrait;

    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->defineGateAuthorization();
    }

    private function defineGateAuthorization()
    {
        $permissions = Permission::all();

        $actionNamesForEachPermission = $this
            ->getActionNamesForEachPermission($permissions);

        foreach ($permissions as $permission) {
            foreach ($actionNamesForEachPermission[$permission->name] as $action) {
                Gate::define(
                    $permission->name . '.' . $action->name,
                    function (User $user) use ($permission, $action) {
                        $roleJson = $user->role->permissions_encode;

                        if (!empty($roleJson)) {
                            $roleArr = json_decode($roleJson, true);

                            $check = isRole($roleArr, $permission->name, $action->name);

                            return $check;
                        }

                        return false;
                    }
                );
            }
        }
    }
}