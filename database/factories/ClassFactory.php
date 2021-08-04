<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clas;
use Faker\Generator as Faker;

$factory->define(Clas::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            "Private Masterclass",
            "TOEFL Masterclass",
            "Engineering Masterclass",
            "Online Masterclass",
            "Testing 1 Masterclass",
            "Testing 2 Masterclass",
            "Testing 3 Masterclass",
            "Testing 4 Masterclass",
            "Testing 5 Masterclass"
        ]),
        'description' => $faker->text($maxNbChars = 100),
        'banner' => '1.jpg'
    ];
});
