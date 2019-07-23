<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\AdditionalService;
use Faker\Generator as Faker;

$factory->define(AdditionalService::class, function (Faker $faker) {
    return [
        'service_name' => $faker->word(),
        'price' => $faker->numberBetween(100,500)
    ];
});
