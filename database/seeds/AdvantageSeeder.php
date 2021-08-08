<?php

use App\Advantage;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(Advantage::class, 6)->create()->each(function ($advantage){
            $advantage->save();
        });
    }
}
