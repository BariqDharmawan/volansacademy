<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clas;
use Faker\Generator as Faker;

$factory->define(Clas::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 100),
        'banner' => '1.jpg'
    ];
});
