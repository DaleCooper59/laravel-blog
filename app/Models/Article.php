<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'picture', 'slug', 'user_id', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id' );
    }
 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
 
    static function articles()
    {
        return Article::all();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%$search%");
    }
   
}
