<?php

namespace App\Filament\Resources\FeaturedArticleResource\Pages;

use App\Filament\Resources\FeaturedArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFeaturedArticle extends CreateRecord
{
    protected static string $resource = FeaturedArticleResource::class;
}
