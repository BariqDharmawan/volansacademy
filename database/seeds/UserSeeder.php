<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'superadmin volans',
                'email' => 'volanswebsite@gmail.com',
                'password' => Hash::make('kipasangin2021'),
                'phone' => '6289699505992',
                'whatsapp' => '6289699505992',
                'role_id' => 1,
            ],
            [
                'name' => 'admin volans',
                'email' => 'adminvolans@gmail.com',
                'password' => Hash::make('kipasangin2021'),
                'phone' => '6289699505992',
                'whatsapp' => '6289699505992',
                'role_id' => 2,
            ]
        ]);

    }
}
