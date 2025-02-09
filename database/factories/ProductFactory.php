<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 10),
        'price' => $faker->numberBetween(100, 10000),
        'available' => $faker->boolean()
    ];
});
