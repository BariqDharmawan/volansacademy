<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->paragraph(),
        'video' => $faker->randomElement(['4.mp4', '5.mp4']),
        'image' => '8.png'
    ];
});
