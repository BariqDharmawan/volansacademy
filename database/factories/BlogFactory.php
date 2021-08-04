<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'body' => $faker->text(200),
        'featured_image' => $faker->image('public/class', 640,480, 'laptop', false),
        'short_description' => $faker->text(20)
    ];
});
