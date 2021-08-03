<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article_Category extends Model
{
    protected $table = 'article_category';
    protected $fillable = ['article_id', 'category_id', 'created_at', 'updated_at'];
   
       
}
