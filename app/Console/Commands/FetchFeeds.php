<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Source;
use App\Models\Article;
use Feeds;

class FetchFeeds extends Command
{
    protected $signature = 'feeds:fetch';
    protected $description = 'Descarga y guarda artículos desde los RSS de sources';

    public function handle()
    {
        $sources = Source::whereNotNull('rss_url')->get();

        foreach ($sources as $src) {
            try {
                $feed = Feeds::make($src->rss_url);

            } catch (\Exception $e) {
                $this->error("Error al parsear {$src->rss_url}: {$e->getMessage()}");
                continue;
            }

            foreach ($feed->get_items() as $item) {
                Article::updateOrCreate(
                    ['url' => $item->get_link()],
                    [
                        'source_id'    => $src->id,
                        'title'        => $item->get_title(),
                        'body'         => $item->get_content() ?: $item->get_description(),
                        'published_at' => $item->get_date('Y-m-d H:i:s'),
                    ]
                );
            }

            $this->info("Importados: {$feed->get_item_quantity()} artículos de {$src->name}");
        }

        return 0;
    }
}
