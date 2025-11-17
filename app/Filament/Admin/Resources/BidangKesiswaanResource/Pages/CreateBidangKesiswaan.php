<?php

namespace App\Filament\Admin\Resources\BidangKesiswaanResource\Pages;

use App\Filament\Admin\Resources\BidangKesiswaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBidangKesiswaan extends CreateRecord
{
    protected static string $resource = BidangKesiswaanResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // langsung kembali ke ListBanners
    }
}
