<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'picture', 'slug', 'category_id'];

    public function category(){
        return $this->belongsToMany(Category::class)->withDefault([
            'name' => 'Guest categorie',
        ]);
    }
}