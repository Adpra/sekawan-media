<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // Menambahkan data user baru
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ],

            // User
            [
                'name' => 'user_1',
                'email' => 'user_1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'manager',
            ],
            [
                'name' => 'user_2',
                'email' => 'user_2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'manager',
            ],

            // Driver
            [
                'name' => 'budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'driver',
            ],
            [
                'name' => 'joko',
                'email' => 'joko@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'driver',
            ],
            [
                'name' => 'bambang',
                'email' => 'bambang@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'driver',
            ],
            [
                'name' => 'muhlish',
                'email' => 'muhlish@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'driver',
            ],
            // Tambahkan data user lainnya sesuai kebutuhan
        ]);
    }
}
