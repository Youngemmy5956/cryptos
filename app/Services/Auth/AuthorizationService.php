<?php

namespace App\Services\Auth;

use App\Helpers\EncryptionHelper;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthorizationService
{
    public static function hasPermissionTo(array $permissions , User $user = null)
    {
        $user = $user ?? auth()->user();
        if(!$user->hasAnyPermission($permissions)){
            abort(403);
        }
    }

    public static function hasRole(array $roles , User $user = null)
    {
        $user = $user ?? auth()->user();
        if(!$user->hasRole($roles)){
            abort(403);
        }
    }


    public static function checkForRoles(array $roles , User $user = null): bool
    {
        $user = $user ?? auth()->user();
        return $user->hasRole($roles);
    }

    public static function syncSudoRoles()
    {
        if(!empty($sudo = developer())){
            $role = Role::firstOrCreate(["name" => "Sudo"]);
            $permissions = Permission::where("guard_name" , "web")->pluck("name")->toArray();
            $role->syncPermissions($permissions);
            $sudo->syncRoles([$role]);
        }
    }

}
