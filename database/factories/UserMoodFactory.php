<?php

namespace Database\Factories;

use App\Enums\UserMoodEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMood>
 */
class UserMoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mood' => $this->faker->randomElement(UserMoodEnum::cases())->value,
        ];
    }
}
