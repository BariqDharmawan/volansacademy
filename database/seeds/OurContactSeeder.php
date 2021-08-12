<?php

use App\OurContact;
use Illuminate\Database\Seeder;

class OurContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OurContact::insert([
            [
                'name' => 'instagram', 
                'value' => 'volansacademy'
            ],
            [
                'name' => 'whatsapp', 
                'value' => '89699505992'
            ],
            [
                'name' => 'alamat', 
                'value' => 'Perum. City Home Regency, Blok F. No. 50 Jl. Keputih Tegal Timur, Sukolilo - Surabaya'
            ],
        ]);
    }
}
