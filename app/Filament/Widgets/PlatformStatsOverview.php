<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PlatformStatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        // Hitung metrik
        $totalUsers = User::count();
        $usersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $usersLastMonth = User::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();

        $totalArticles = Article::count();
        $articlesThisMonth = Article::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $totalChatSessions = ChatSession::count();
        $chatSessionsToday = ChatSession::whereDate('created_at', Carbon::today())->count();

        $totalMessages = ChatMessage::count();
        $messagesToday = ChatMessage::whereDate('created_at', Carbon::today())->count();

        // Hitung persentase pertumbuhan
        $userGrowth = $usersLastMonth > 0 ?
            round((($usersThisMonth - $usersLastMonth) / $usersLastMonth) * 100, 1) : 0;

        return [
            Stat::make('Total Pengguna', number_format($totalUsers))
                ->description($userGrowth >= 0 ? "+{$userGrowth}% pertumbuhan bulan ini" : "{$userGrowth}% bulan ini")
                ->descriptionIcon($userGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($userGrowth >= 0 ? 'success' : 'danger')
                ->chart([
                    User::whereDate('created_at', Carbon::now()->subDays(6))->count(),
                    User::whereDate('created_at', Carbon::now()->subDays(5))->count(),
                    User::whereDate('created_at', Carbon::now()->subDays(4))->count(),
                    User::whereDate('created_at', Carbon::now()->subDays(3))->count(),
                    User::whereDate('created_at', Carbon::now()->subDays(2))->count(),
                    User::whereDate('created_at', Carbon::now()->subDays(1))->count(),
                    User::whereDate('created_at', Carbon::today())->count(),
                ]),

            Stat::make('Total Artikel', number_format($totalArticles))
                ->description("+{$articlesThisMonth} diterbitkan bulan ini")
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Sesi Chat', number_format($totalChatSessions))
                ->description("+{$chatSessionsToday} dibuat hari ini")
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning')
                ->chart([
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(6))->count(),
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(5))->count(),
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(4))->count(),
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(3))->count(),
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(2))->count(),
                    ChatSession::whereDate('created_at', Carbon::now()->subDays(1))->count(),
                    ChatSession::whereDate('created_at', Carbon::today())->count(),
                ]),

            Stat::make('Total Pesan', number_format($totalMessages))
                ->description("+{$messagesToday} dikirim hari ini")
                ->descriptionIcon('heroicon-m-chat-bubble-bottom-center')
                ->color('success')
                ->chart([
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(6))->count(),
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(5))->count(),
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(4))->count(),
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(3))->count(),
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(2))->count(),
                    ChatMessage::whereDate('created_at', Carbon::now()->subDays(1))->count(),
                    ChatMessage::whereDate('created_at', Carbon::today())->count(),
                ]),
        ];
    }
}
