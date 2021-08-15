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
                'name' => 'banner 1',
                'image' => '1.jpg'
            ],
            [
                'name' => 'banner 2',
                'image' => '2.jpg'
            ],
            [
                'name' => 'banner 3',
                'image' => '3.jpg'
            ],
            [
                'name' => 'banner 4',
                'image' => '4.jpg'
            ],
        ]);
    }
}
