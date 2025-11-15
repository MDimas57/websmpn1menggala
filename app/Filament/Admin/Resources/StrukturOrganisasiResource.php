<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\StrukturOrganisasiResource\Pages;
use App\Models\StrukturOrganisasi;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class StrukturOrganisasiResource extends Resource
{
       public static function getModelLabel(): string
{
    return 'Struktur Sekolah';
}

public static function getPluralModelLabel(): string
{
    return 'Struktur Sekolah';
}
    protected static ?string $model = StrukturOrganisasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?string $navigationLabel = 'Struktur Sekolah';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')->label('Judul Struktur Organisasi'),
            Forms\Components\FileUpload::make('foto')->label('Foto Struktur Organisasi')->image() ->directory('katasambutan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul Struktur'),
                ImageColumn::make('foto')->label('Foto Struktur'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Struktur Organisasi')
                    ->modalContent(fn ($record) => view('filament.admin.struktur.preview', compact('record')))
                    ->modalWidth('3xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit' => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
