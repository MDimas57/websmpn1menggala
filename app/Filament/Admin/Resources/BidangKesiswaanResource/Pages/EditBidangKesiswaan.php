<?php

namespace App\Filament\Admin\Resources\BidangKesiswaanResource\Pages;

use App\Filament\Admin\Resources\BidangKesiswaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangKesiswaan extends EditRecord
{
    protected static string $resource = BidangKesiswaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
