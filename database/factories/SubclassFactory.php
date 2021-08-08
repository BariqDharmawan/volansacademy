<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subclass;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Subclass::class, function (Faker $faker) {
    return [
        'banner' => $faker->randomElement(['1.jpg', '2.jpg']),
        'detail_info_program' => $faker->randomElement(['1.jpg', '2.jpg']),
        'garansi_program' => $faker->randomElement(['1.jpg', '2.jpg']),
        'garansi_program_2' => $faker->randomElement(['1.jpg', '2.jpg']),
        'gambar_profesi_1' => $faker->randomElement(['1.jpg', '2.jpg']),
        'gambar_profesi_2' => $faker->randomElement(['1.jpg', '2.jpg']),
        'banner_konfirmasi' => $faker->randomElement(['1.jpg', '2.jpg']),
        'fasilitas_program' => $faker->randomElement(['1.jpg', '2.jpg']),
        'fasilitas_bimbel' => $faker->randomElement(['1.jpg', '2.jpg']),
        'lokasi_belajar' => $faker->randomElement(['1.jpg', '2.jpg']),
        'banner_alumni' => $faker->randomElement(['1.jpg', '2.jpg']),
        'video_alumni_testi_1' => 'https://www.youtube.com/watch?v=obpZS7qWGeU',
        'video_alumni_testi_2' => 'https://www.youtube.com/watch?v=rQ9haxqd7Mg',
        'thumbnail_video_alumni_testi_1' => $faker->randomElement(['1.jpg', '2.jpg']),
        'thumbnail_video_alumni_testi_2' => $faker->randomElement(['1.jpg', '2.jpg']),
        'banner_tagline' => $faker->randomElement(['1.jpg', '2.jpg']),
        'gambar_aktifitas_belajar' => $faker->randomElement(['1.jpg', '2.jpg']),
        'icon' => $faker->randomElement(['1.jpg', '2.jpg']),
        'class_id' => mt_rand(1, 9),
        'name' => $faker->sentence(mt_rand(4, 7)),
        'description' => '<p>' . $faker->paragraph() . '</p>',
        'facilities' => $faker->paragraph(10),
        'periode' => Carbon::now(),
        'price' => $faker->numberBetween(1000, 100000)
    ];
});
