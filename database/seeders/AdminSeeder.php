<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Safety',
            'email' => 'admin@sic.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Admin Safety',
            'nik' => '99999999',
            'email' => 'admin@sic.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

    }
    
}
