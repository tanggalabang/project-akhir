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
            'name' => 'Admin',
        ]);
        DB::table('users')->insert([
            'email' => "teacher@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 2,
            'name' => 'Teacher',
        ]);
        DB::table('users')->insert([
            'email' => "student@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 3,
            'class_id' => 1,
            'nis' => '22720/1727.063',
            'name' => 'Student 1',
            'gender' => 'L',
        ]);
        DB::table('users')->insert([
            'email' => "student1@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 3,
            'class_id' => 2,
            'nis' => '22721/1727.063',
            'name' => 'Student 2',
            'gender' => 'P',
        ]);
        DB::table('users')->insert([
            'email' => "student2@email.com",
            'password' => Hash::make('123456'),
            'user_type' => 3,
            'class_id' => 3,
            'nis' => '22722/1727.063',
            'name' => 'Student 3',
            'gender' => 'L',
        ]);
    }
}
