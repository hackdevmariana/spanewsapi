<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('summary'),
            Forms\Components\TextInput::make('url')->required()->url(),
            Forms\Components\FileUpload::make('image')->directory('articles')->image(),
            Forms\Components\DateTimePicker::make('published_at'),
            Forms\Components\Select::make('source_id')
                ->relationship('source', 'name')
                ->required(),
            Forms\Components\Select::make('municipality_id')
                ->relationship('municipality', 'name'),
            Forms\Components\Select::make('tags')
                ->multiple()
                ->relationship('tags', 'name'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('source.name'),
            Tables\Columns\TextColumn::make('published_at')->dateTime(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
