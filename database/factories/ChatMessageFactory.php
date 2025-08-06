<?php

namespace Database\Factories;

use App\Enums\ChatRoleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatMessage>
 */
class ChatMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chat_session_id' => \App\Models\ChatSession::factory(),
            'role' => $this->faker->randomElement([ChatRoleEnum::USER->value, ChatRoleEnum::AI->value]),
            'content' => $this->faker->paragraph(),
            'is_liked' => $this->faker->boolean(),
            'is_disliked' => $this->faker->boolean(),
        ];
    }
}
