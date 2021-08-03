<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Mockery\Undefined;

$factory->define(Category::class, function (Faker $faker) {

    $cat = Category::all()->pluck('id')->toArray();
    
    return [
        'name' => $faker->realText(25, 2),
        'parent_id' => empty($cat) === true || $cat === 0 ? 1 : random_int(1, count($cat)),
    ];
});
