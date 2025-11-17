<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranaResource\Pages;

use App\Filament\Admin\Resources\SaranaPrasaranaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSaranaPrasarana extends CreateRecord
{
    protected static string $resource = SaranaPrasaranaResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // langsung kembali ke ListBanners
    }
}
