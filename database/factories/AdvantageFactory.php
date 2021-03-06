<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advantage;
use Faker\Generator as Faker;

$factory->define(Advantage::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(mt_rand(4, 6)),
        'image' => $faker->randomElement(['1.jpg', '2.jpg'])
    ];
});
