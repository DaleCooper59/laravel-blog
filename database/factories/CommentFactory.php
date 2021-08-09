<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = User::all()->pluck('id')->toArray();
    $article = Article::all()->pluck('id')->toArray();

    return [
        'article_id' => random_int(1, count($article)),
        'user_id' => random_int(1, count($user)),
        'content' => $faker->realText(200),
        'approuved' => $faker->boolean(),
        
    ];
});
