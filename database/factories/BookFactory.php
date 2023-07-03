<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'title' => fake()->sentence(1),
            'description' => fake()->paragraph(3),
            'price' => fake()->numberBetween(500, 2000),
            'quantity' => fake()->numberBetween(10, 75),
            'author_id' => Author::inRandomOrder()->first()->id,
        ];
    }
}
