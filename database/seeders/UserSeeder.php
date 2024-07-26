<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Toro',
            'name' => 'Tam',
            'email' => 'torotam07@gmail.com',
            'password' => Hash::make('tam'),
            'role' => 'client',
        ]);
    }
}

