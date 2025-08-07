<?php

namespace App\Filament\Resources\SongCategoryResource\Pages;

use App\Filament\Resources\SongCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSongCategory extends CreateRecord
{
    protected static string $resource = SongCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
