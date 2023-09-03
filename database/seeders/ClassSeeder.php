<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('class')->insert([
            'name' => "RPL",
        ]);
        DB::table('class')->insert([
            'name' => "TKJ",
        ]);
        DB::table('class')->insert([
            'name' => "MEKA",
        ]);
    }
}
