<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'body' => $faker->text($maxNbChars = 200),
        'featured_image' => $faker->randomElement(['1.jpg', '2.jpg']),
        'short_description' => $faker->paragraph(
            $nbSentences = 3, $variableNbSentences = true
        )
    ];
});
