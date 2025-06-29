<?php

namespace Database\Seeders;


/*

Usage:

    php artisan db:seed --class=RssFeedSeeder
*/


use Illuminate\Database\Seeder;
use App\Models\RssFeed;
use App\Models\Source;

class RssFeedSeeder extends Seeder
{
    public function run(): void
    {
        $feeds = [
            [
                'source_slug' => 'diario-de-sevilla',
                'url'         => 'https://www.diariodesevilla.es/seccion-politica/rss',
                'section'     => 'Política',
            ],
            [
                'source_slug' => 'diario-de-sevilla',
                'url'         => 'https://www.diariodesevilla.es/seccion-deportes/rss',
                'section'     => 'Deportes',
            ],
            [
                'source_slug' => 'el-correo-de-andalucia',
                'url'         => 'https://www.elcorreoweb.es/rss/noticias',
                'section'     => 'Noticias generales',
            ],
            // Más feeds aquí...
        ];

        foreach ($feeds as $feed) {
            $source = Source::where('slug', $feed['source_slug'])->first();

            if (!$source) {
                // Si no existe la fuente, puedes loguear o continuar
                $this->command->warn("Source with slug '{$feed['source_slug']}' not found, skipping RSS feed {$feed['url']}");
                continue;
            }

            RssFeed::updateOrCreate(
                ['url' => $feed['url']],
                [
                    'source_id' => $source->id,
                    'section'   => $feed['section'] ?? null,
                ]
            );
        }
    }
}
