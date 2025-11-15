<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KontakResource\Pages;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;

class KontakResource extends Resource
{
         public static function getModelLabel(): string
{
    return 'Pesan';
}

public static function getPluralModelLabel(): string
{
    return 'Pesan';
}
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Pesan';
    protected static ?string $navigationGroup = 'Kontak Masuk';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('no_telepon')
                    ->label('No Telepon')
                    ->disabled(),
                Forms\Components\Textarea::make('pesan')->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('no_telepon')->label('No Telepon'),
                TextColumn::make('pesan')->label('Pesan')->limit(30),
                TextColumn::make('created_at')->label('Tanggal')->dateTime('d-m-Y H:i'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
            ])
            ->bulkActions([]); // tidak ada delete massal
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'view' => Pages\ViewKontak::route('/{record}'),
        ];
    }
}
