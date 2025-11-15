<?php

namespace App\Filament\Admin\Resources\KontakResource\Pages;

use App\Filament\Admin\Resources\KontakResource;
use Filament\Resources\Pages\ViewRecord;

class ViewKontak extends ViewRecord
{
    protected static string $resource = KontakResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
