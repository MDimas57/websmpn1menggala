<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Banner (Beranda)';
    protected static ?string $pluralModelLabel = 'Banner';
    protected static ?string $navigationGroup = 'Halaman Depan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Banner')
                    ->maxLength(100)
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan (opsional)')
                    ->maxLength(255),

                FileUpload::make('foto')
                    ->label('Upload Foto Banner')
                    ->image()
                    ->imageResizeMode('contain') // 'cover' atau 'contain'
                    ->disk('public')        // <-- TAMBAHKAN INI (Gunakan disk public)
                    ->directory('banners')  // <-- TAMBAHKAN INI (Simpan di folder banners)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Banner')
                    ->square()
                    ->visibility('public')
                    ->disk('public')
                    ->width(100)
                    ->height(50),
                TextColumn::make('judul')
                    ->searchable()
                    ->label('Judul'),
                TextColumn::make('keterangan')
                    ->limit(40)
                    ->label('Keterangan'),
                TextColumn::make('created_at')
                    ->date('d M Y')
                    ->label('Tanggal Upload'),
            ])
            ->filters([])
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
