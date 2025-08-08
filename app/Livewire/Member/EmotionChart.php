<?php

namespace App\Livewire\Member;

use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class EmotionChart extends Component
{
    public $chartId;

    public function mount()
    {
        // Set a stable chart ID that won't change on re-renders
        $this->chartId = 'emotion-chart-'.auth()->id();
    }

    #[On('user-mood-created')]
    public function refreshChart()
    {
        // Get fresh data and dispatch to JavaScript
        $chartData = $this->getWeeklyEmotionData();
        $this->dispatch('updateChart', $chartData);
    }

    public function render()
    {
        $chartData = $this->getWeeklyEmotionData();
        // $moodStats = $this->getWeeklyMoodStatistics();

        return view('member.pages.dashboard.components.emotion-chart', [
            'chartData' => $chartData,
            'emotions' => auth()->user()->userMoods()->get(),
            // 'moodStats' => $moodStats
        ]);
    }

    private function getWeeklyEmotionData()
    {
        // Get last 7 days
        $days = [];
        $dayLabels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $days[] = $date->format('Y-m-d');
            $dayLabels[] = $date->locale('id')->isoFormat('dddd');
        }

        // Get user moods for the last 7 days
        $userMoods = auth()->user()->userMoods()
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($mood) {
                return Carbon::parse($mood->created_at)->format('Y-m-d');
            });

        // Process data for chart
        $moodLabels = [
            'happy' => '😄 Bahagia',
            'neutral' => '😐 Netral',
            'angry' => '😡 Marah',
            'disappointed' => '😟 Kecewa',
            'sad' => '😭 Sedih',
            'crying' => '😢 Menangis',
        ];

        // Create mood frequency data for each day
        $moodFrequency = [];
        foreach ($days as $day) {
            $dayMoods = $userMoods->get($day, collect());

            // Count most frequent mood for the day, or set to neutral if no data
            if ($dayMoods->isEmpty()) {
                $moodFrequency[] = 1; // neutral as default
            } else {
                $moodCounts = $dayMoods->countBy('mood');
                $mostFrequentMood = $moodCounts->sortDesc()->keys()->first();

                // Map mood to chart index
                $moodIndex = match ($mostFrequentMood) {
                    'happy' => 0,
                    'neutral' => 1,
                    'angry' => 2,
                    'disappointed' => 3,
                    'sad' => 4,
                    'crying' => 5,
                    default => 1
                };

                $moodFrequency[] = $moodIndex;
            }
        }

        return [
            'labels' => $dayLabels,
            'data' => $moodFrequency,
            'moodLabels' => array_values($moodLabels),
        ];
    }

    // private function getWeeklyMoodStatistics()
    // {
    //     $moods = auth()->user()->userMoods()
    //         ->where('created_at', '>=', Carbon::now()->subDays(7))
    //         ->get();

    //     $moodCounts = $moods->countBy('mood');
    //     $totalMoods = $moods->count();

    //     $stats = [];
    //     foreach (['happy', 'neutral', 'angry', 'disappointed', 'sad', 'crying'] as $mood) {
    //         $count = $moodCounts->get($mood, 0);
    //         $percentage = $totalMoods > 0 ? round(($count / $totalMoods) * 100) : 0;

    //         $stats[$mood] = [
    //             'count' => $count,
    //             'percentage' => $percentage,
    //             'icon' => match($mood) {
    //                 'happy' => '😄',
    //                 'neutral' => '😐',
    //                 'angry' => '😡',
    //                 'disappointed' => '😟',
    //                 'sad' => '😭',
    //                 'crying' => '😢',
    //                 default => '😐'
    //             }
    //         ];
    //     }

    //     return $stats;
    // }
}
