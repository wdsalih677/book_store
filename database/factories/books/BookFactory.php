<?php

namespace Database\Factories\books;

use App\Models\categories\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\books\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'auther' => fake()->name,
            'category_id' => Category::factory(),
            'description' => fake()->paragraph,
            'image' => fake()->imageUrl(640, 480, 'books', true),
            'price' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
