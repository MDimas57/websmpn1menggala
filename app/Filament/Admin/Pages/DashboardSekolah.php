<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Filament\Admin\Widgets\DashboardStats;

class DashboardSekolah extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard Sekolah';
    protected static ?string $title = 'Dashboard Sekolah';
    protected static string $view = 'filament.admin.pages.dashboard-sekolah';

    protected function getHeaderWidgets(): array
    {
        return [
            DashboardStats::class,
        ];
    }
}
