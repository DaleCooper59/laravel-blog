<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'username' => $faker->ean8(),
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
       
    ];
});
