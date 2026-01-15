<?php

namespace App\Filament\Admin\Resources\OrganisasiResource\Pages;

use App\Filament\Admin\Resources\OrganisasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListOrganisasis extends ListRecords
{
    protected static string $resource = OrganisasiResource::class;

    public function getTitle(): string
    {
        return 'Daftar Organisasi';
    }

    public function getBreadcrumb(): string
    {
        return 'Daftar Organisasi';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Organisasi'),
        ];
    }
}
