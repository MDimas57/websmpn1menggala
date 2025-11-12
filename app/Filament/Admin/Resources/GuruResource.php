<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, FileUpload, DatePicker, Select, Grid};
use Filament\Tables\Columns\{TextColumn, ImageColumn};

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Tenaga Pendidik';
    protected static ?string $pluralModelLabel = 'Guru';
    protected static ?string $navigationGroup = 'Kelola Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('nik')
                        ->label('NIK')
                        ->numeric()
                        ->maxLength(20),

                    Select::make('jenis_kelamin')
                        ->label('Jenis Kelamin')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->required(),

                    TextInput::make('tempat_lahir')
                        ->label('Tempat Lahir')
                        ->maxLength(100),

                    DatePicker::make('tanggal_lahir')
                        ->label('Tanggal Lahir'),

                    TextInput::make('jenis_gtk')
                        ->label('Jenis GTK')
                        ->placeholder('Contoh: Guru Mapel, TU, Kepala Sekolah'),

                    FileUpload::make('foto')
                        ->label('Foto Guru')
                        ->image()
                        ->directory('guru')
                        ->maxSize(2048)
                        ->imageEditor(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->width(60)
                    ->height(60),

                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable(),

                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin'),

                TextColumn::make('tempat_lahir')
                    ->label('Tempat Lahir'),
                    
                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir'),

                TextColumn::make('jenis_gtk')
                    ->label('Jenis GTK')
                    ->sortable(),
            ])
            ->defaultSort('nama_lengkap')
            ->actions([
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
