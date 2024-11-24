<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        // Create admin user
        User::create([
            'name' => 'Admin Everflow',
            'email' => 'admin@everflow.site',
            'password' => Hash::make('Admin#1234'),
            'role' => 'admin',
        ]);

        // Create regular user
        User::create([
            'name' => 'Customer Everflow',
            'email' => 'customer@everflow.site',
            'password' => Hash::make('Admin#1234'),
            'role' => 'user',
        ]);
    }
}
