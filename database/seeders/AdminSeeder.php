<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com', // You can change this to your desired admin email
                'password' => Hash::make('admin@123'), // You should change this to a secure password
            ]
        );
    }
}
