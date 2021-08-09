<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';
    
    protected $fillable = ['username', 'name', 'email', 'email_verified_at', 'password', 'remeber_token'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}