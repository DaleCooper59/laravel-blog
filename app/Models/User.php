<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';
    
    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remeber_token'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}