<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
      'pick_up_location_id' => $faker->numberBetween(1,10),
      'drop_off_location_id'=> $faker->numberBetween(1,10),
      'category_id'=> $faker->numberBetween(1,10),
      'name' => $faker->name(),
      'lastname'=> $faker->lastName(),
      'address'=>$faker->address(),
      'email'=>$faker->email(),
      'cell_phone' => $faker->phoneNumber(),
      'pick_up_date' => $faker->dateTimeThisYear(),
      'drop_off_date'=> $faker->dateTimeThisYear(),
      'total_cost'=> $faker->numberBetween(1000,5000),
      'paid' => $faker->boolean(),
      'paid_at' => $faker->dateTimeThisYear(),
      'discount' => $faker->numberBetween(0, 25),
      'canceled' => false,
      'canceled_at'=> null,
      'refound_percentage' => null
    ];
});
