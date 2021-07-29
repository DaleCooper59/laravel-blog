<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Article_Category extends Model
{
    protected $table = 'Article_Category';

   // public $collection = Article::all()->pluck('category_id')->all();
    /*Schema::table('articles', function (Blueprint $table) {
        $table->dropColumn('category_id');
    });*/

   // public $cat = new Article_Category;
    

    //$articles->categories()->sync($collection);
/*
    while ($collection) {
        // $cat->fill(array('category_id' => $c));
        //dd($k);
    };*/
       
}
