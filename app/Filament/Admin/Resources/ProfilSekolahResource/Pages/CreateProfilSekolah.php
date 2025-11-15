<?php

namespace App\Filament\Admin\Resources\ProfilSekolahResource\Pages;

use App\Filament\Admin\Resources\ProfilSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilSekolah extends CreateRecord
{
    protected static string $resource = ProfilSekolahResource::class;
     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); 
    }
}
