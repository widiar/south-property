<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'AC'],
            ['name' => 'Carport'],
            ['name' => 'Fire Extinguisher'],
            ['name' => 'Garasi'],
            ['name' => 'Garden'],
            ['name' => 'Gorden'],
            ['name' => 'Microwave'],
            ['name' => 'Oven'],
            ['name' => 'PAM / PDAM'],
            ['name' => 'Refrigerator'],
            ['name' => 'Stove'],
            ['name' => 'Swimming Pool'],
            ['name' => 'Telephone'],
            ['name' => 'Water Heater'],
            ['name' => 'Balcony'],
            ['name' => 'Electricity'],
            ['name' => 'CCTV'],
            ['name' => 'TV'],
            ['name' => 'Wifi'],
        ];
        Facility::insert($data);
    }
}
