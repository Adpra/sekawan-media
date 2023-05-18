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

        $startDate = strtotime('-1 year');
        $endDate = strtotime('+1 year');
        $randomTimestamp = random_int($startDate, $endDate);
        $scheduleDate = date('Y-m-d', $randomTimestamp);

        DB::table('vehicles')->truncate();

        // Menambahkan data vehicle baru
        DB::table('vehicles')->insert([
            [
                'name' => 'Car A',
                'type' => 'Sedan',
                'fuel_consumption' => 50,
                'service_schedule' => '2023-02-21'
            ],
            [
                'name' => 'Car B',
                'type' => 'SUV',
                'fuel_consumption' => 60,
                'service_schedule' => '2023-10-1'

            ],
            [
                'name' => 'Truck X',
                'type' => 'Pickup Truck',
                'fuel_consumption' => 66,
                'service_schedule' => '2023-01-21'
            ],
            [
                'name' => 'Motorcycle Y',
                'type' => 'Sport',
                'fuel_consumption' => 55,
                'service_schedule' => '2023-03-11'

            ],
            [
                'name' => 'Van Z',
                'type' => 'Minivan',
                'fuel_consumption' => 80,
                'service_schedule' => '2023-08-21'
            ],
            [
                'name' => 'Car C',
                'type' => 'Hatchback',
                'fuel_consumption' => 67,
                'service_schedule' => '2023-09-24'
            ],
            [
                'name' => 'Truck W',
                'type' => 'Box Truck',
                'fuel_consumption' => 65,
                'service_schedule' => '2023-12-30'
            ],
            [
                'name' => 'Motorcycle X',
                'type' => 'Cruiser',
                'fuel_consumption' => 55,
                'service_schedule' => '2023-05-25'
            ],
            [
                'name' => 'Car D',
                'type' => 'Convertible',
                'fuel_consumption' => 40,
                'service_schedule' => '2023-03-2'

            ],
            [
                'name' => 'Scooter Y',
                'type' => 'Moped',
                'fuel_consumption' => 34,
                'service_schedule' => '2023-02-22'
            ],
        ]);
    }
}
