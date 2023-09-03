<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => "admin@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 1, 
            'class_id' => 1, 
        ]);
        DB::table('users')->insert([
            'email' => "teacher@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 2, 
            'class_id' => 2, 
        ]);
        DB::table('users')->insert([
            'email' => "student@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 3, 
            'class_id' => 3, 
        ]);
    }
}
