<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;


class RecentArticles extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Article::query()->latest('published_at')->limit(10);
    }


    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')->limit(50)->searchable(),
            TextColumn::make('source.name')->label('Source'),
            TextColumn::make('published_at')->dateTime(),
        ];
    }
}
