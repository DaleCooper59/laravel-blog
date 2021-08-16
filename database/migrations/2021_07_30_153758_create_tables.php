<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });


        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title')->unique();
            $table->string('content')->unique();
            $table->string('picture');
            $table->string('slug');
            $table->bigInteger('user_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('parent_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });

        Schema::create('keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('article_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });


        Schema::create('article_category', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('article_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->bigInteger('category_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });

       



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
