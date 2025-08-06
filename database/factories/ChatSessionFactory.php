<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatSession>
 */
class ChatSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'is_bookmarked' => $this->faker->boolean(20), // 20% chance bookmarked
            'is_favorite' => $this->faker->boolean(10),   // 10% chance favorite
            'deleted_at' => $this->faker->optional(0.3)->dateTime(), // 30% chance of being deleted
        ];
    }
}
