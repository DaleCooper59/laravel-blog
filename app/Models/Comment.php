<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['content', 'approuved', 'article_id', 'user_id'];

    public function articles()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*public function user(){
        return $this->hasOne(User::class);
    }*/
}
