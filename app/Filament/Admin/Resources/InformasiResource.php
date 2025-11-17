<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InformasiResource\Pages;
use App\Models\Informasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class InformasiResource extends Resource
{
              public static function getModelLabel(): string
{
    return 'Informasi Sekolah';
}

public static function getPluralModelLabel(): string
{
    return 'Informasi Sekolah';
}
    protected static ?string $model = Informasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Kelola Halaman';
    protected static ?string $navigationLabel = 'Informasi Sekolah';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label('Judul Informasi')
                ->required(),

            Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('file_upload')
                ->label('Upload File (PDF)')
                ->directory('informasi/file')
                ->acceptedFileTypes(['application/pdf']),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Informasi')
                    ->modalContent(fn ($record) =>
                        view('filament.admin.informasi.preview', ['record' => $record])
                    )
                    ->modalWidth('4xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformasis::route('/'),
            'create' => Pages\CreateInformasi::route('/create'),
            'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }
}
