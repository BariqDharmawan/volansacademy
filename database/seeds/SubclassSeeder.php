<?php

use App\Helper;
use App\Subclass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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
