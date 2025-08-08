<?php

namespace Database\Seeders;

use App\Enums\UserMoodEnum;
use App\Models\User;
use App\Models\UserMood;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users with member role
        $users = User::where('role', 'member')->get();

        foreach ($users as $user) {
            // Create mood data for the last 7 days
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);

                // Only 1 mood entry per day
                $mood = $this->getRealisticMood($date, 0);

                UserMood::create([
                    'user_id' => $user->id,
                    'mood' => $mood->value,
                    'created_at' => $date->copy()->addHours(rand(8, 20))->addMinutes(rand(0, 59)),
                    'updated_at' => $date->copy()->addHours(rand(8, 20))->addMinutes(rand(0, 59)),
                ]);
            }
        }
    }

    /**
     * Generate more realistic mood patterns based on day and time
     */
    private function getRealisticMood(Carbon $date, int $entryIndex): UserMoodEnum
    {
        $dayOfWeek = $date->dayOfWeek;
        $random = rand(1, 100);

        // Monday - slightly more neutral/disappointed (Monday blues)
        if ($dayOfWeek === 1) {
            if ($random <= 30) {
                return UserMoodEnum::NEUTRAL;
            }
            if ($random <= 50) {
                return UserMoodEnum::DISAPPOINTED;
            }
            if ($random <= 70) {
                return UserMoodEnum::HAPPY;
            }
            if ($random <= 85) {
                return UserMoodEnum::SAD;
            }

            return UserMoodEnum::ANGRY;
        }

        // Friday - more happy moods (TGIF)
        if ($dayOfWeek === 5) {
            if ($random <= 50) {
                return UserMoodEnum::HAPPY;
            }
            if ($random <= 70) {
                return UserMoodEnum::NEUTRAL;
            }
            if ($random <= 85) {
                return UserMoodEnum::DISAPPOINTED;
            }

            return UserMoodEnum::SAD;
        }

        // Weekend - generally happier
        if (in_array($dayOfWeek, [0, 6])) {
            if ($random <= 45) {
                return UserMoodEnum::HAPPY;
            }
            if ($random <= 70) {
                return UserMoodEnum::NEUTRAL;
            }
            if ($random <= 85) {
                return UserMoodEnum::DISAPPOINTED;
            }
            if ($random <= 95) {
                return UserMoodEnum::SAD;
            }

            return UserMoodEnum::ANGRY;
        }

        // Regular weekdays - balanced mood distribution
        if ($random <= 25) {
            return UserMoodEnum::HAPPY;
        }
        if ($random <= 45) {
            return UserMoodEnum::NEUTRAL;
        }
        if ($random <= 65) {
            return UserMoodEnum::DISAPPOINTED;
        }
        if ($random <= 80) {
            return UserMoodEnum::SAD;
        }
        if ($random <= 90) {
            return UserMoodEnum::ANGRY;
        }

        return UserMoodEnum::CRYING;
    }
}
