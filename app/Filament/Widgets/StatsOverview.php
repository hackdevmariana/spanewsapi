<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Source;
use App\Models\Municipality;
use App\Models\FeaturedArticle;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Articles', Article::count()),
            Stat::make('Total Sources', Source::count()),
            Stat::make('Municipalities with Articles', Article::distinct('municipality_id')->count('municipality_id')),
            Stat::make('Featured Articles', FeaturedArticle::count()),
        ];
    }
}
