<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    protected static ?string $navigationLabel = 'Dasbor';

    protected static ?string $title = 'Dasbor';

    protected static ?int $navigationSort = 0;

    public function mount(): void
    {
        // Daftarkan CSS kustom untuk dasbor
        FilamentAsset::register([
            Css::make('custom-dashboard', asset('assets/filament/css/custom-dashboard.css')),
            Css::make('dark-mode-dashboard', asset('assets/filament/css/dark-mode.css')),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Anda dapat menambahkan aksi header di sini jika diperlukan
        ];
    }

    public function getTitle(): string
    {
        return 'Ringkasan Dasbor';
    }

    public function getHeading(): string
    {
        return 'Dasbor Ruang Tenang';
    }

    public function getSubheading(): string
    {
        return 'Pantau performa platform kesehatan mental dan keterlibatan pengguna Anda.';
    }
}
