<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tutor;
use Faker\Generator as Faker;

$factory->define(Tutor::class, function (Faker $faker) {
    return [
        'field' => $faker->word(),
        'name' => $faker->name(),
        'from' => $faker->word(),
        'image' => $faker->randomElement([
            'tutor4.png', 'tutor5.png', 'tutor6.png', 'tutor7.png', 'tutor8.png'
        ]),
    ];
});
