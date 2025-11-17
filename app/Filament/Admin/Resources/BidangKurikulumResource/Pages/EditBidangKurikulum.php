<?php

namespace App\Filament\Admin\Resources\BidangKurikulumResource\Pages;

use App\Filament\Admin\Resources\BidangKurikulumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBidangKurikulum extends EditRecord
{
    protected static string $resource = BidangKurikulumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
