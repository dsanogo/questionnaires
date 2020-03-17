<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'brand' => $faker->sentence,
        'price' => $faker->phoneNumber
    ];
});
