<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5, true),
            'body' => fake()->paragraphs(3, true),
            'is_flagged' => fake()->boolean(20),
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
            'author_id' => fake()->numberBetween(1, 10),
        ];
    }
}
