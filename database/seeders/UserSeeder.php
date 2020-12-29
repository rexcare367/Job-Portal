<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Administrator',
            'email' => 'super@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
