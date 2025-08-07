<?php

namespace App\Filament\Resources\SongCategoryResource\Pages;

use App\Filament\Resources\SongCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSongCategory extends EditRecord
{
    protected static string $resource = SongCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
