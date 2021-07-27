<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConfigurationSeeder::class,
            BannerHomeSeeder::class,
            BlogSeeder::class,
            ClassSeeder::class,
            VideoSeeder::class
        ]);
    }
}
