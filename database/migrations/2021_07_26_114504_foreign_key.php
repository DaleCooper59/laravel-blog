<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::table('articles', function(Blueprint $table){
            //$table->dropColumn('user_id');
 
        });

        Schema::table('comments', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::table('category', function(Blueprint $table){
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('category');
        });

        Schema::table('keywords', function(Blueprint $table){
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
