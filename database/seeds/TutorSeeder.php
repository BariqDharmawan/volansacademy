<?php

use App\Tutor;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tutor::class, 9)->create()->each(function ($tutor){
            $tutor->save();
        });
    }
}
