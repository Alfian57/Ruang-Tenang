<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            $chatSessionCount = rand(5, 15);

            for ($i = 0; $i < $chatSessionCount; $i++) {
                $chatSession = ChatSession::factory()->create([
                    'user_id' => $user->id,
                ]);

                $chatMessages = ChatMessage::factory()->count(5)->create([
                    'chat_session_id' => $chatSession->id,
                ]);

                $chatSession->messages()->saveMany($chatMessages);
            }
        });

    }
}
