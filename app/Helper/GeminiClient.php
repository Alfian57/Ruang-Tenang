<?php

namespace App\Helper;

use App\Enums\ChatRoleEnum;
use Gemini;
use Gemini\Data\Content;
use Gemini\Enums\Role;

class GeminiClient
{
    private Gemini\Client $client;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $geminiApiKey = env('GEMINI_API_KEY');
        $this->client = Gemini::client($geminiApiKey);
    }

    public function prompt(string $prompt): string
    {
        $result = $this->client->generativeModel(model: 'gemini-2.0-flash')->generateContent($prompt);

        return $result->text();
    }

    public function promptWithHistory(string $prompt, array $history): string
    {
        // Convert $history (array of ['message' => ..., 'role' => ...]) to Content objects
        $historyContents = [];
        foreach ($history as $item) {
            $role = $item['role'] === ChatRoleEnum::USER->value ? Role::USER : Role::MODEL;
            $historyContents[] = Content::parse(part: $item['message'], role: $role);
        }

        $chat = $this->client->generativeModel(model: 'gemini-2.0-flash')->startChat(history: $historyContents);

        $response = $chat->sendMessage($prompt);

        return $response->text();
    }
}
