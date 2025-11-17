<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BidangKurikulumResource\Pages;
use App\Models\BidangKurikulum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BidangKurikulumResource extends Resource
{
            public static function getModelLabel(): string
{
    return 'Bidang Kurikulum';
}

public static function getPluralModelLabel(): string
{
    return 'Bidang Kurikulum';
}
    protected static ?string $model = BidangKurikulum::class;
    protected static ?string $navigationGroup = 'Bidang Sekolah';
    protected static ?string $navigationLabel = 'Bidang Kurikulum';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('bidang_kurikulum/foto')
                    ->label('Foto'),

                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('jabatan')
                    ->required(),

                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('file_upload')
                    ->directory('bidang_kurikulum/file')
                    ->label('Upload File'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->modalHeading('Preview Bidang Kurikulum')
                    ->modalWidth('7xl')
                    ->modalContent(function ($record) {
                        return view('filament.admin.bidang.preview', [
                            'record' => $record,
                        ]);
                    })
                    ->icon('heroicon-o-eye'),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBidangKurikulums::route('/'),
            'create' => Pages\CreateBidangKurikulum::route('/create'),
            'edit' => Pages\EditBidangKurikulum::route('/{record}/edit'),
        ];
    }
}

