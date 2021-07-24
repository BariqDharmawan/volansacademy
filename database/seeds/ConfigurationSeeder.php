<?php

use App\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::insert([
            [
                'name' => 'subscribe banner',
                'value' => 'subscribe banner.jpg'
            ],
            [
                'name' => 'subscribe banner hape',
                'value' => 'subscribe banner hape.jpg'
            ],
            [
                'name' => 'testimonial banner',
                'value' => 'testimonial banner.jpg'
            ],
            [
                'name' => 'testimonial banner hape',
                'value' => 'testimonial banner hape.jpg'
            ],
        ]);
    }
}
