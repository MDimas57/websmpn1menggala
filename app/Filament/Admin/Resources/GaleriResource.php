<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, FileUpload, Select, Grid};
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Actions\Action;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $pluralModelLabel = 'Galeri Sekolah';
    protected static ?string $navigationGroup = 'Kelola Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nama_kegiatan')
                        ->label('Nama Kegiatan')
                        ->required(),

                    Select::make('tipe')
                        ->label('Tipe')
                        ->options([
                            'foto' => 'Foto',
                            'video' => 'Video',
                        ])
                        ->required(),

                    FileUpload::make('file')
                        ->label('Upload File')
                        ->directory('galeri')
                        ->maxSize(51200)
                        ->imageEditor()
                        ->required()
                        ->helperText('Upload foto (jpg, png) atau video (mp4) kegiatan.'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file')
                    ->label('Preview')
                    ->square()
                    ->width(80)
                    ->height(80)
                    ->getStateUsing(fn ($record) => $record ? asset('storage/' . $record->file) : null)
                    ->visible(fn ($record) => $record && $record->tipe === 'foto'),

                IconColumn::make('tipe')
                    ->label('Tipe')
                    ->icon(fn ($state) => $state === 'foto' ? 'heroicon-o-photo' : 'heroicon-o-video-camera')
                    ->color(fn ($state) => $state === 'foto' ? 'info' : 'warning'),

                TextColumn::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d M Y - H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                // Tombol View
                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Galeri')
                    ->modalContent(function (Galeri $record) {
                        if ($record->tipe === 'foto') {
                            return view('filament.admin.galeri.preview-foto', ['record' => $record]);
                        } else {
                            return view('filament.admin.galeri.preview-video', ['record' => $record]);
                        }
                    })
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
