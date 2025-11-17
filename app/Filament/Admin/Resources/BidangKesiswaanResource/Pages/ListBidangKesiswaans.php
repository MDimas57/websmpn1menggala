<?php

namespace App\Filament\Admin\Resources\BidangKesiswaanResource\Pages;

use App\Filament\Admin\Resources\BidangKesiswaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangKesiswaans extends ListRecords
{
    protected static string $resource = BidangKesiswaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
