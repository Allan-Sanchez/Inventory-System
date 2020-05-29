<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buy;
use Faker\Generator as Faker;

$factory->define(Buy::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nameKit'=> $faker->randomElement($array = array ('pc','keyboard','desktop','mouse')),
        'quantity' => $faker->numberBetween($min = 1, $max = 500),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
        'state_id' => $faker->numberBetween($min = 1, $max = 3)
        
    ];
});
