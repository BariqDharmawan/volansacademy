<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'testimonial' => $faker->text(mt_rand(100, 200)),
        'name' => $faker->name(),
        'from' => $faker->word(),
        'image' => $faker->randomElement([
            'testi1.jpg', 'testi2.jpg', 'testi3.png', 'testi4.png'
        ])
    ];
});
