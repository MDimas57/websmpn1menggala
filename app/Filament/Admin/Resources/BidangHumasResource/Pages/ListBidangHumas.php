<?php

namespace App\Filament\Admin\Resources\BidangHumasResource\Pages;

use App\Filament\Admin\Resources\BidangHumasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBidangHumas extends ListRecords
{
    protected static string $resource = BidangHumasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
