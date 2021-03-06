<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->ean8(),
        'avatar' => 'no-avatar',
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => Str::random(30), // password
        'remember_token' => Str::random(10),
    ];
});
