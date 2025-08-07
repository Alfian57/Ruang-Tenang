<?php

namespace App\Filament\Resources\SongCategoryResource\Pages;

use App\Filament\Resources\SongCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSongCategories extends ListRecords
{
    protected static string $resource = SongCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
