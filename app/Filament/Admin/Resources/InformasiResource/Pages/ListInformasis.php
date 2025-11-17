<?php

namespace App\Filament\Admin\Resources\InformasiResource\Pages;

use App\Filament\Admin\Resources\InformasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasis extends ListRecords
{
    protected static string $resource = InformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
