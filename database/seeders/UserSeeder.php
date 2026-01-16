<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);


        $vendor1 = User::create([
            'name' => 'Vendor One',
            'email' => 'vendor1@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor'
        ]);


        $vendor2 = User::create([
            'name' => 'Vendor Two',
            'email' => 'vendor2@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor'
        ]);

        $vendor3 = User::create([
            'name' => 'Vendor three',
            'email' => 'vendor3@test.com',
            'password' => bcrypt('password'),
            'role' => 'vendor'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'akshay@test.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'raza@test.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'hari@test.com',
            'password' => bcrypt('password'),
            'role' => 'customer'
        ]);
    }
}
