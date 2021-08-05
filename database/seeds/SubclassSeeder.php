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
        factory(Subclass::class, 40)->create()->each(function ($subclass){
            $subclass->save();
        });
    }
}
