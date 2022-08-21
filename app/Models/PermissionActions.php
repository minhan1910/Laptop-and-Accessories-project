<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionActions extends Model
{
    use HasFactory;

    protected $table = 'permission_actions';

    public function action()
    {
        return $this->belongsTo(Action::class, 'id', 'action_id');
    }
}