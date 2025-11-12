<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\{TextInput, FileUpload, Textarea, RichEditor, Select};
use Filament\Tables\Columns\{TextColumn, ImageColumn, BadgeColumn};

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
 protected static ?string $navigationGroup = 'Halaman Depan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                TextInput::make('penulis')
                    ->label('Penulis')
                    ->default('Admin'),

                FileUpload::make('gambar')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('berita')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->required(),

                RichEditor::make('konten')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ])
                    ->default('draft')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->square()
                    ->width(100)
                    ->height(50),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('penulis')
                    ->label('Penulis')
                    ->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'publish',
                    ]),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->date('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
