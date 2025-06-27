<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Source;
use App\Models\Article;
use Kalimeromk\Rssfeed\Facades\RssFeed;

class FetchFeeds extends Command
{
    protected $signature = 'feeds:fetch';
    protected $description = 'Importa feeds RSS a artículos';

    public function handle()
    {
        $sources = Source::whereNotNull('rss_url')->get();

        foreach ($sources as $src) {
            try {
                $feed = RssFeed::make($src->rss_url);
            } catch (\Exception $e) {
                $this->error("Error en {$src->rss_url}: {$e->getMessage()}");
                continue;
            }

            foreach ($feed->items() as $item) {
                Article::updateOrCreate(
                    ['url' => $item->url],
                    [
                        'source_id'    => $src->id,
                        'title'        => $item->title,
                        'body'         => $item->content ?? $item->description,
                        'published_at' => $item->pubDate,
                    ]
                );
            }

            $this->info("Importados " . count($feed->items()) . " artículos de {$src->name}");
        }

        return 0;
    }
}
