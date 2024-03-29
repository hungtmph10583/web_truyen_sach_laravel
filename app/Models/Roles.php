<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Roles extends Model
{
    use HasFactory;

    public function model_has_role()
    {
        return $this->hasMany(ModelHasRole::class, 'role_id');
    }

    public function role_has_permission()
    {
        return $this->hasMany(RoleHasPermission::class, 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
