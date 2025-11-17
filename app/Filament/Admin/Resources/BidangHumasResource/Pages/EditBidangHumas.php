<?php

namespace App\Filament\Admin\Resources\BidangHumasResource\Pages;

use App\Filament\Admin\Resources\BidangHumasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangHumas extends EditRecord
{
    protected static string $resource = BidangHumasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
