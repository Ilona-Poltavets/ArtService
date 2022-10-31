<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasRolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('label', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermission($permission)
    {
        //dd($this->roles[0]->permissions);
        return (bool)$this->roles[0]->permissions->where('label', $permission)->count();
    }

//    public function hasPermissionThroughRole($permission)
//    {
//        foreach ($permission->roles as $role) {
//            if ($this->roles->contains($role)) {
//                return true;
//            }
//        }
//        return false;
//    }

//    public function hasPermissionTo($permission)
//    {
//        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission->label);
//    }

    public function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('label', $permissions)->get();
    }

    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
