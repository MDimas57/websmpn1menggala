<?php

namespace App\Filament\Admin\Resources\KataSambutanResource\Pages;

use App\Filament\Admin\Resources\KataSambutanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKataSambutan extends CreateRecord
{
    protected static string $resource = KataSambutanResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // langsung kembali ke ListBanners
    }
}
