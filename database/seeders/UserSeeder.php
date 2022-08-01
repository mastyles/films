<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Creating a few different users for the sake of test purpose (optional):
        $users = [
            [
                'first_name' => 'Nick',
                'last_name' => 'Welles',
                'email' => 'welles100@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Johnny',
                'last_name' => 'Wilson',
                'email' => 'wilson100@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Moen',
                'last_name' => 'Raza',
                'email' => 'raza100@gmail.com',
                'password' => Hash::make('password'),
            ]
        ];
        User::insert($users);
    }
}
