<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinceResource\Pages;
use App\Filament\Resources\ProvinceResource\RelationManagers;
use App\Models\Province;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form->schema([
        Forms\Components\TextInput::make('name')->required(),
        Forms\Components\TextInput::make('slug')->required(),
        Forms\Components\Select::make('autonomous_community_id') // 👈 Este es el campo relacional
            ->label('Comunidad Autónoma')
            ->relationship('community', 'name')
            ->searchable()
            ->required(),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
        Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
        Tables\Columns\TextColumn::make('slug')->sortable(),
        Tables\Columns\TextColumn::make('community.name') // 👈 Aquí muestras el nombre de la comunidad
            ->label('Comunidad Autónoma')
            ->sortable()
            ->searchable(),
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
            'index' => Pages\ListProvinces::route('/'),
            'create' => Pages\CreateProvince::route('/create'),
            'edit' => Pages\EditProvince::route('/{record}/edit'),
        ];
    }
}
