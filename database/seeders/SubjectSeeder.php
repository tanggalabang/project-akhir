<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('subject')->insert([
            'name' => "Math",
        ]);
        DB::table('subject')->insert([
            'name' => "English",
        ]);
        DB::table('subject')->insert([
            'name' => "Computer",
        ]);
    }
}
