<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $table = 'roles';
    
    protected $fillable = ['name','user_id', 'role_id'];

    public function users() {
        return $this->belongsToMany(User::class, 'user_role');
    }

    
}
