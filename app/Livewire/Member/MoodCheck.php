<?php

namespace App\Livewire\Member;

use Livewire\Component;

class MoodCheck extends Component
{
    public function render()
    {
        return view('member.pages.dashboard.components.mood-check');
    }

    public function createMood(string $mood)
    {
        $user = auth()->user();
        // Cek apakah user sudah membuat mood hari ini
        $todayMood = $user->userMoods()->whereDate('created_at', now()->toDateString())->first();
        if ($todayMood) {
            return;
        }

        $mood = $user->userMoods()->create([
            'mood' => $mood,
        ]);

        $this->dispatch('user-mood-created', ['mood' => $mood]);
        $this->dispatch('closeMoodOptions');
    }
}
