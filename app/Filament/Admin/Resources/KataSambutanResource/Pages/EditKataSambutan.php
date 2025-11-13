<?php

namespace App\Filament\Admin\Resources\KataSambutanResource\Pages;

use App\Filament\Admin\Resources\KataSambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKataSambutan extends EditRecord
{
    protected static string $resource = KataSambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
