<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content')->unique();
            $table->boolean('approuved');
            $table->timestamps();
            $table->bigInteger('article_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->bigInteger('user_id')->unsigned()->index()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id')->unique();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
