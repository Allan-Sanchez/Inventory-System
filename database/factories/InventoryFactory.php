<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inventory;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'buy_id' => $faker->numberBetween($min = 1, $max = 9),
        'location_id' => $faker->numberBetween($min = 1, $max = 9),
        'state_id' => $faker->numberBetween($min = 1, $max = 9)
    ];
});
