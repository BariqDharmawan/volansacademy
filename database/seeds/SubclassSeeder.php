<?php

use App\Subclass;
use Illuminate\Database\Seeder;

class SubclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subclass::class, 10)->create()->each(function ($subclass){
            $subclass->save();
        });
    }
}
