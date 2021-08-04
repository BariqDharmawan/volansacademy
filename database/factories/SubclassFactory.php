<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subclass;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Subclass::class, function (Faker $faker) {
    return [
        'icon' => $faker->image('public/class', 640,480, 'nature', false),
        'class_id' => mt_rand(1, 9),
        'name' => $faker->sentence(mt_rand(4, 7)),
        'description' => $faker->paragraph(),
        'facilities' => $faker->paragraph(10),
        'periode' => Carbon::now(),
        'price' => $faker->numberBetween(1000, 100000)
    ];
});
