<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ppdb;
use App\Models\Kontak;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Guru', Guru::count())
                ->description('Jumlah tenaga pendidik')
                ->color('success')
                ->icon('heroicon-o-user-group'),

            Stat::make('Total Berita', Berita::count())
                ->description('Jumlah berita dipublikasikan')
                ->color('info')
                ->icon('heroicon-o-newspaper'),

            Stat::make('Total Galeri', Galeri::count())
                ->description('Foto & video kegiatan')
                ->color('warning')
                ->icon('heroicon-o-photo'),

            Stat::make('Informasi PPDB', Ppdb::count())
                ->description('Jumlah informasi aktif')
                ->color('primary')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Pesan Masuk', Kontak::count())
                ->description('Kritik & saran')
                ->color('danger')
                ->icon('heroicon-o-envelope'),
        ];
    }
}
