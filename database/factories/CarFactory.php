<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'brand' => $faker->word(),
        'model' => $faker->word(),
        'year' => $faker->year(),
        'category_id' => $faker->numberBetween(1,10)
    ];
});
