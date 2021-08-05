<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->paragraph(),
        'video' => $faker->randomElement(['https://www.youtube.com/watch?v=V7OYKI1zKJ8', 'https://www.youtube.com/watch?v=QfVR2-_Jkx0', 'https://www.youtube.com/watch?v=MgBPd6Oos94', 'https://www.youtube.com/watch?v=JG0yLWS8FTM']),
        'image' => $faker->image('public/video', 640,480, 'cats', false)
    ];
});
