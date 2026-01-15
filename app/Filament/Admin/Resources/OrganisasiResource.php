<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OrganisasiResource\Pages;
use App\Filament\Admin\Resources\OrganisasiResource\RelationManagers;
use App\Models\Organisasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganisasiResource extends Resource
{
    protected static ?string $model = Organisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
      protected static ?string $navigationLabel = 'Organisasi';
    protected static ?string $pluralModelLabel = 'Organisasi';
    protected static ?string $navigationGroup = 'Halaman Depan';

   public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Organisasi')
                    ->image()
                    ->disk('public') // Disimpan di storage/app/public
                    ->directory('organisasi') // Disimpan di folder 'organisasi'
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        if ($record->foto) {
                            // Mengarahkan ke folder yang sesuai di disk public
                            return 'organisasi/' . $record->foto;
                        }
                        return null;
                    })
                    ->circular(), // Membuat foto berbentuk bulat

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([ /* ... */ ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganisasis::route('/'),
            'create' => Pages\CreateOrganisasi::route('/create'),
            'edit' => Pages\EditOrganisasi::route('/{record}/edit'),
        ];
    }
}
