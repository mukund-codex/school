<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@yopmail.com',
            'mobile' => '9999999999',
            'dob' => '1990-01-01',
            'gender' => 'male',
            'role' => 'admin',
            'status' => true,
            'password' => Hash::make('Password@123'),
        ]);
    }
}
