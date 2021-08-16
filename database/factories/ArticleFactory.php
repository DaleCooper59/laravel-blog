<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    $user = User::all()->pluck('id')->toArray();

    return [
        'title' => $faker->realText(25, 2),
        'content' => $faker->text(200),
        'picture' => 'no',
        'slug' => $faker->realText(10, 2),
        'user_id' => random_int(1, count($user))/*User::factory()*/,
        'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
    ];
});
