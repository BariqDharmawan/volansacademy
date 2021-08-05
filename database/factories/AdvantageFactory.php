<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Advantage;
use Faker\Generator as Faker;

$factory->define(Advantage::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(mt_rand(4, 6)),
        'image' => $faker->image('public/advantage', 640,480, 'nature', false)
    ];
});
