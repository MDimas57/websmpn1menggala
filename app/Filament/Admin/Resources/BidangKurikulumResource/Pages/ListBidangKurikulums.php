<?php

namespace App\Filament\Admin\Resources\BidangKurikulumResource\Pages;

use App\Filament\Admin\Resources\BidangKurikulumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangKurikulums extends ListRecords
{
    protected static string $resource = BidangKurikulumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
