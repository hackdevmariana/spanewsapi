<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturedArticleResource\Pages;
use App\Filament\Resources\FeaturedArticleResource\RelationManagers;
use App\Models\FeaturedArticle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeaturedArticleResource extends Resource
{
    protected static ?string $model = FeaturedArticle::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('article_id')
                ->relationship('article', 'title')
                ->required(),
            Forms\Components\DatePicker::make('start_date'),
            Forms\Components\DatePicker::make('end_date'),
            Forms\Components\TextInput::make('scope'),
            Forms\Components\TextInput::make('topic'),
            Forms\Components\TextInput::make('priority')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('article.title'),
            Tables\Columns\TextColumn::make('start_date')->date(),
            Tables\Columns\TextColumn::make('end_date')->date(),
            Tables\Columns\TextColumn::make('priority'),
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
            'index' => Pages\ListFeaturedArticles::route('/'),
            'create' => Pages\CreateFeaturedArticle::route('/create'),
            'edit' => Pages\EditFeaturedArticle::route('/{record}/edit'),
        ];
    }
}
