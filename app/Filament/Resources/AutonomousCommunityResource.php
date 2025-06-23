<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutonomousCommunityResource\Pages;
use App\Filament\Resources\AutonomousCommunityResource\RelationManagers;
use App\Models\AutonomousCommunity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutonomousCommunityResource extends Resource
{
    protected static ?string $model = AutonomousCommunity::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\TextInput::make('slug')->required()->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('slug')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAutonomousCommunities::route('/'),
            'create' => Pages\CreateAutonomousCommunity::route('/create'),
            'edit' => Pages\EditAutonomousCommunity::route('/{record}/edit'),
        ];
    }
}
