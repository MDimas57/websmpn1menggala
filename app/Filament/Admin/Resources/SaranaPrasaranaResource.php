<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SaranaPrasaranaResource\Pages;
use App\Models\SaranaPrasarana;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class SaranaPrasaranaResource extends Resource
{
            public static function getModelLabel(): string
{
    return 'Bidang Sarana & Prasarana';
}

public static function getPluralModelLabel(): string
{
    return 'Bidang Sarana & Prasarana';
}
    protected static ?string $model = SaranaPrasarana::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Bidang Sekolah';
    protected static ?string $navigationLabel = 'Bidang Sarana Prasarana';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('foto')->image()->label('Foto')->required() ->directory('sarana_prasarana/foto'),

            Forms\Components\TextInput::make('nama')->required(),

            Forms\Components\TextInput::make('jabatan')->required(),

            Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->columnSpanFull()
                ->required(),

            Forms\Components\FileUpload::make('file_upload')
                ->label('Upload File')
                 ->directory('sarana_prasarana/file')
                ->acceptedFileTypes(['application/pdf']),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                Tables\Columns\ImageColumn::make('foto')->label('Foto'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Bidang Sarana & Prasarana')
                    ->modalContent(fn ($record) =>
                        view('filament.admin.bidang.preview', ['record' => $record])
                    )
                    ->modalWidth('4xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaranaPrasaranas::route('/'),
            'create' => Pages\CreateSaranaPrasarana::route('/create'),
            'edit' => Pages\EditSaranaPrasarana::route('/{record}/edit'),
        ];
    }
}
