<?php

use App\Helper;
use App\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Video::class, 4)->create()->each(function ($video){
            $video->save();
        });
    }
}
