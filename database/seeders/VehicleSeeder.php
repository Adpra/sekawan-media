<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('vehicles')->truncate();

        // Menambahkan data vehicle baru
        DB::table('vehicles')->insert([
            [
                'name' => 'Car A',
                'type' => 'Sedan',
            ],
            [
                'name' => 'Car B',
                'type' => 'SUV',
            ],
            [
                'name' => 'Truck X',
                'type' => 'Pickup Truck',
            ],
            [
                'name' => 'Motorcycle Y',
                'type' => 'Sport',
            ],
            [
                'name' => 'Van Z',
                'type' => 'Minivan',
            ],
            [
                'name' => 'Car C',
                'type' => 'Hatchback',
            ],
            [
                'name' => 'Truck W',
                'type' => 'Box Truck',
            ],
            [
                'name' => 'Motorcycle X',
                'type' => 'Cruiser',
            ],
            [
                'name' => 'Car D',
                'type' => 'Convertible',
            ],
            [
                'name' => 'Scooter Y',
                'type' => 'Moped',
            ],
        ]);
    }
}
