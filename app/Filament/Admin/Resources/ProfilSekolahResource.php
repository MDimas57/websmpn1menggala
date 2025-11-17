<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfilSekolahResource\Pages;
use App\Models\ProfilSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ProfilSekolahResource extends Resource
{
    public static function getModelLabel(): string
    {
        return 'Profil Sekolah';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Profil Sekolah';
    }

    protected static ?string $model = ProfilSekolah::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Profil Sekolah';
    protected static ?string $navigationLabel = 'Profil Sekolah';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('logo')
                ->label('Logo Sekolah')
                ->directory('profil-sekolah')
                ->image()
                ->required(),

            Forms\Components\TextInput::make('nama_sekolah')
                ->label('Nama Sekolah')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('akreditasi')
                ->label('Akreditasi')
                ->maxLength(5),

            Forms\Components\TextInput::make('jumlah_rombel')
                ->label('Jumlah Rombel')
                ->numeric(),

            Forms\Components\TextInput::make('jumlah_tenaga_pendidik')
                ->label('Jumlah Tenaga Pendidik')
                ->numeric(),

            Forms\Components\TextInput::make('jumlah_peserta_didik')
                ->label('Jumlah Peserta Didik')
                ->numeric(),

            Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi Profil Sekolah')
                ->columnSpanFull()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'strike',
                    'bulletList',
                    'orderedList',
                    'blockquote',
                    'alignLeft',
                    'alignCenter',
                    'alignRight',
                    'alignJustify',   // <-- Agar bisa rata kiri–kanan
                    'link',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->width(60)
                    ->height(60),

                TextColumn::make('nama_sekolah')
                    ->label('Nama Sekolah')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('akreditasi')
                    ->label('Akreditasi'),

                TextColumn::make('jumlah_rombel')
                    ->label('Rombel'),

                TextColumn::make('jumlah_tenaga_pendidik')
                    ->label('Tenaga Pendidik'),

                TextColumn::make('jumlah_peserta_didik')
                    ->label('Peserta Didik'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Profil Sekolah')
                    ->modalContent(fn ($record) =>
                        view('filament.admin.profil-sekolah.preview', compact('record'))
                    )
                    ->modalWidth('3xl'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfilSekolah::route('/'),
            'create' => Pages\CreateProfilSekolah::route('/create'),
            'edit' => Pages\EditProfilSekolah::route('/{record}/edit'),
        ];
    }
}
