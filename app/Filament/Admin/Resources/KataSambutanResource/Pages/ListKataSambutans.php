<?php

namespace App\Filament\Admin\Resources\KataSambutanResource\Pages;

use App\Filament\Admin\Resources\KataSambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKataSambutans extends ListRecords
{
    protected static string $resource = KataSambutanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
