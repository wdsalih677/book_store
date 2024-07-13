<?php

namespace Database\Seeders;

use App\Models\warehouses\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            "name" => "المستودع الأول",
            "location" => "الدامر",
        ]);
        Warehouse::create([
            "name" => "المستودع الثاني",
            "location" => "عطبره",
        ]);
        Warehouse::create([
            "name" => "المستودع الثالث",
            "location" => "بربر",
        ]);
    }
}
