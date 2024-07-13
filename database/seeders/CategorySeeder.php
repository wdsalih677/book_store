<?php

namespace Database\Seeders;

use App\Models\categories\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::create([
            "name" => "القسم الأول",
            "description" => "قسم الكتب"
        ]);
        Category::create([
            "name" => "القسم الثاني",
            "description" => "قسم الروايات"
        ]);
        Category::create([
            "name" => "القسم الثالث",
            "description" => "قسم التسويق"
        ]);
    }
}
