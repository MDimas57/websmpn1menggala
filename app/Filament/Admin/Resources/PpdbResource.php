<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PpdbResource\Pages;
use App\Models\Ppdb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Informasi PPDB';
    protected static ?string $pluralModelLabel = 'Informasi PPDB';
    protected static ?string $modelLabel = 'Informasi PPDB';
    protected static ?string $navigationGroup = 'Kelola Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->directory('ppdb')
                    ->image()
                    ->imageEditor()
                    ->required(),

                Forms\Components\RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'bulletList', 'orderedList', 'link', 'blockquote',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Preview')
                    ->square()
                    ->width(80)
                    ->height(80),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Informasi PPDB')
                    ->modalContent(fn (Ppdb $record) => view('filament.admin.ppdb.preview', ['record' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup'),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/create'),
            'edit' => Pages\EditPpdb::route('/{record}/edit'),
        ];
    }
}
