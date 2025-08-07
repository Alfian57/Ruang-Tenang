<?php

namespace App\Filament\Widgets;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AiChatActivityChart extends ChartWidget
{
    protected static ?string $heading = 'Aktivitas Chat AI';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $chatData = [];
        $messageData = [];
        $labels = [];

        // Ambil 7 hari terakhir
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('j M');

            $chatData[] = ChatSession::whereDate('created_at', $date)->count();
            $messageData[] = ChatMessage::whereDate('created_at', $date)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Sesi Chat Baru',
                    'data' => $chatData,
                    'borderColor' => '#d90429',
                    'backgroundColor' => '#d90429',
                    'type' => 'line',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Pesan Terkirim',
                    'data' => $messageData,
                    'borderColor' => '#2b2d42',
                    'backgroundColor' => '#2b2d42',
                    'type' => 'line',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'mode' => 'index',
                    'intersect' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'display' => true,
                        'color' => 'rgba(0, 0, 0, 0.1)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
            'interaction' => [
                'mode' => 'index',
                'intersect' => false,
            ],
        ];
    }
}
