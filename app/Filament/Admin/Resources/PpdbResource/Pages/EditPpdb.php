<?php

namespace App\Filament\Admin\Resources\PpdbResource\Pages;

use App\Filament\Admin\Resources\PpdbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpdb extends EditRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
