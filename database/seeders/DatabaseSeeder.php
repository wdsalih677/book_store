<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\books\Book;
use App\Models\categories\Category;
use App\Models\User;
use Database\Factories\BookFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(10)->create();
        Category::factory(5)->create();
        
        $this->call([
            PremissionSeeder::class,
            UserSeeder::class,
            // CategorySeeder::class,
            WarehousesSeeder::class,
        ]);
    }
}
