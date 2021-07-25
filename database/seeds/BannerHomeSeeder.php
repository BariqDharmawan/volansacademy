<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::insert([
            [
                'image' => '1.jpg'
            ],
            [
                'image' => '2.jpg'
            ],
            [
                'image' => '3.jpg'
            ],
            [
                'image' => '4.jpg'
            ],
        ]);
    }
}
