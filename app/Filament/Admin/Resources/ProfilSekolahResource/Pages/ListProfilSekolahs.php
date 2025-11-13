<?php

namespace App\Filament\Admin\Resources\ProfilSekolahResource\Pages;

use App\Filament\Admin\Resources\ProfilSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilSekolahs extends ListRecords
{
    protected static string $resource = ProfilSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
