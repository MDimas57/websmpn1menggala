<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BidangHumasResource\Pages;
use App\Models\BidangHumas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class BidangHumasResource extends Resource
{
    protected static ?string $model = BidangHumas::class;
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Bidang Sekolah';
    protected static ?string $navigationLabel = 'Bidang Humas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('foto')->image()->label('Foto')->required() ->directory('bidang_humas/foto'),

            Forms\Components\TextInput::make('nama')
                ->required(),

            Forms\Components\TextInput::make('jabatan')
                ->required(),

            Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->columnSpanFull()
                ->required(),

            Forms\Components\FileUpload::make('file_upload')
                ->label('Upload File')
                ->directory('bidang_humas/file')
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
                    ->modalHeading('Detail Bidang Humas')
                    ->modalContent(fn ($record) =>
                        view('filament.admin.bidang.preview', ['record' => $record])
                    )
                    ->modalWidth('4xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBidangHumas::route('/'),
            'create' => Pages\CreateBidangHumas::route('/create'),
            'edit' => Pages\EditBidangHumas::route('/{record}/edit'),
        ];
    }
}
