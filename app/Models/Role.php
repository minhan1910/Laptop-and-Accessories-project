<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'permisison_id', 'role_id');
    }
}