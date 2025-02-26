<?php

namespace App\Filament\Resources\KeySectorResource\Pages;

use App\Filament\Resources\KeySectorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeySectors extends ListRecords
{
    protected static string $resource = KeySectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
