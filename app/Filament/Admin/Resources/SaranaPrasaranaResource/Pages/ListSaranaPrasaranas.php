<?php

namespace App\Filament\Admin\Resources\SaranaPrasaranaResource\Pages;

use App\Filament\Admin\Resources\SaranaPrasaranaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaranaPrasaranas extends ListRecords
{
    protected static string $resource = SaranaPrasaranaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
