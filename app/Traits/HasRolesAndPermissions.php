<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRolesAndPermissions
{




    public function hasRole(...$roles) : bool
    {
        foreach ($roles as $role) {
            if ($this->role->contains('slug', $role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission) : bool
    {
        return (bool) $this->permissions->where('slug', $permission)->count();
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission) : bool
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission->slug);
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionThroughRole($permission) : bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }
}
