<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'capacity' => $faker->numberBetween(4, 9),
        'cost' => $faker->numberBetween(1000, 3000)
    ];
});
