<?php
namespace App\Permissions;

trait HasPermissionTrait {

    public function hasPermission($permission) : bool
    {
        return $this->role->permissions()->where('slug',$permission)->first() ? true : false;
    }
}
