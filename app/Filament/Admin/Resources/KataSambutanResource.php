<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KataSambutanResource\Pages;
use App\Models\KataSambutan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class KataSambutanResource extends Resource
{
    protected static ?string $model = KataSambutan::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?string $navigationLabel = 'Kata Sambutan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kepsek')->label('Nama Kepala Sekolah'),
            Forms\Components\TextInput::make('jabatan')->label('Jabatan'),
            Forms\Components\FileUpload::make('foto')->label('Foto Kepala Sekolah')->image() ->directory('katasambutan'),
            Forms\Components\Textarea::make('kata_sambutan')->label('Isi Sambutan')->rows(6),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')->label('Foto'),
                TextColumn::make('nama_kepsek')->label('Nama'),
                TextColumn::make('jabatan')->label('Jabatan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Kata Sambutan')
                    ->modalContent(fn ($record) => view('filament.admin.kata-sambutan.preview', compact('record')))
                    ->modalWidth('3xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKataSambutans::route('/'),
            'create' => Pages\CreateKataSambutan::route('/create'),
            'edit' => Pages\EditKataSambutan::route('/{record}/edit'),
        ];
    }
}
