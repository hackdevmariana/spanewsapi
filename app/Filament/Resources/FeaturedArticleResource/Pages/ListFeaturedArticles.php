<?php

namespace App\Filament\Resources\FeaturedArticleResource\Pages;

use App\Filament\Resources\FeaturedArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeaturedArticles extends ListRecords
{
    protected static string $resource = FeaturedArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
