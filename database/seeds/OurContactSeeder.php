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
                'value' => 'volansacademy',
                'platform' => 'instagram',
                'link' => 'https://www.instagram.com/volansacademy',
            ],
            [
                'name' => 'whatsapp', 
                'value' => '89699505992',
                'platform' => 'whatsapp',
                'link' => 'https://wa.me/6289699505992',
            ],
            [
                'name' => 'alamat', 
                'value' => 'Perum. City Home Regency, Blok F. No. 50 Jl. Keputih Tegal Timur, Sukolilo - Surabaya',
                'platform' => 'custom',
                'link' => 'https://goo.gl/maps/tFzLZjPgB3LV2VNd6',
            ],
        ]);
    }
}
