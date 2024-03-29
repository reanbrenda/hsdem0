<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

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
            'is_featured' => fake()->boolean(35),
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
            'author_id' => fake()->numberBetween(1, 10),
        ];
    }

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ];
        });
    }

    /*
    public function configure()
    {
         return $this->afterCreating(function (Post $post) {
            $url = 'https://source.unsplash.com/random/1200x800';
            $post
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }*/

    // Solution from https://laracasts.com/discuss/channels/testing/how-to-disable-factory-callbacks
    public function withoutAfterCreating()
    {
        $this->afterCreating = new Collection;

        return $this;
    }
}
