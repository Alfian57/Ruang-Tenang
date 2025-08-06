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

        // add context
        $context = $this->getAiContext();
        $historyContents[] = Content::parse(part: $context, role: Role::USER);

        foreach ($history as $item) {
            $role = $item['role'] === ChatRoleEnum::USER->value ? Role::USER : Role::MODEL;
            $historyContents[] = Content::parse(part: $item['message'], role: $role);
        }

        $chat = $this->client->generativeModel(model: 'gemini-2.0-flash')->startChat(history: $historyContents);

        $response = $chat->sendMessage($prompt);

        return $response->text();
    }

    public function filterResponse(string $response): string
    {
        // Remove all occurrences of ```html or ``` from the response
        return preg_replace('/```html|```/', '', $response);
    }

    public function getAiContext(): string
    {
        // Load AI context from a file or environment variable
        $context = file_get_contents(storage_path('app/private/ai-context.txt'));
        if ($context === false) {
            throw new \Exception('Failed to load AI context');
        }

        return $context;
    }
}
