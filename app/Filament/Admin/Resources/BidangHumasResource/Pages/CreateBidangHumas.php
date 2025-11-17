<?php

namespace App\Filament\Admin\Resources\BidangHumasResource\Pages;

use App\Filament\Admin\Resources\BidangHumasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBidangHumas extends CreateRecord
{
    protected static string $resource = BidangHumasResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // langsung kembali ke ListBanners
    }
}
