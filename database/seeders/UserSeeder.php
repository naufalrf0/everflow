<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat Admin
        User::create([
            'name' => 'Admin EverFlow',
            'email' => 'admin@everflow.com',
            'password' => Hash::make('Admin#1234'), // Hashing benar
            'role' => 'admin',
        ]);

        // Buat Customer
        User::create([
            'name' => 'Customer EverFlow',
            'email' => 'customer@everflow.com',
            'password' => Hash::make('Admin#1234'), // Hashing benar
            'role' => 'customer',
        ]);
    }
}
