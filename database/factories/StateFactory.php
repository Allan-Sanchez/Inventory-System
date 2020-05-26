<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\State;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    return [
        'state' =>$faker->randomElement($array = array ('sold','repair','store')),
        'name'=> $faker->name,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),

    ];
});
