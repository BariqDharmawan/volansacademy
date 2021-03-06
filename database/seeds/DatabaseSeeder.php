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
            BannerHomeSeeder::class,
            BlogSeeder::class,
            ClassSeeder::class,
            VideoSeeder::class,
            TestimonialSeeder::class,
            TutorSeeder::class,
            AdvantageSeeder::class,
            SubclassSeeder::class,
            UserSeeder::class,
            OurContactSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
