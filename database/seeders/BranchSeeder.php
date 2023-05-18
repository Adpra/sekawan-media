<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branchs')->truncate();

        // Menambahkan data user baru
        DB::table('branchs')->insert([
            [
                'name' => 'Branch A',
                'address' => 'Address A',
                'city' => 'City A',
            ],
            [
                'name' => 'Branch B',
                'address' => 'Address B',
                'city' => 'City B',
            ],
            [
                'name' => 'Branch C',
                'address' => 'Address C',
                'city' => 'City C',
            ],
        ]);
    }
}
