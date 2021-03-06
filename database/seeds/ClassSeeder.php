<?php

use App\Clas;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Clas::class, 9)->create()->each(function ($course){
            $course->save();
        });
    }
}
