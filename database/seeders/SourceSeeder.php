<?php

namespace Database\Seeders;


/*

Usage:

    php artisan db:seed --class=SourceSeeder
*/

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\AutonomousCommunity;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name'             => 'Diario de Sevilla',
                // 'slug'           => 'diario-de-sevilla', // Opcional si quieres generar automáticamente
                'url'              => 'https://www.diariodesevilla.es/',
                // 'rss_url'          => 'https://www.diariodesevilla.es/feeds/',
                'editorial_email'  => 'redaccion@diariodesevilla.es',
                'commercial_email' => 'publicidad@diariodesevilla.es',
                'type'             => 'digital',
                'geographic_scope' => 'provincial',
                'main_topic'       => 'actualidad',
                'municipality_id'  => Municipality::where('name', 'Sevilla')->value('id'),
                'province_id'      => Province::where('slug', 'sevilla')->value('id'),
                'community_id'     => AutonomousCommunity::where('slug', 'andalucia')->value('id'),
            ],
            [
                'name'             => 'El correo de Andalucía',
                // 'slug'           => 'el-correo-de-andalucia',
                'url'              => 'https://www.elcorreoweb.es/',
                // 'rss_url'          => '',
                'editorial_email'  => 'redaccion@correoandalucia.es',
                'commercial_email' => 'publicidad@correoandalucia.es',
                'type'             => 'digital',
                'geographic_scope' => 'autonómico',
                'main_topic'       => 'actualidad',
                'community_id'     => AutonomousCommunity::where('slug', 'andalucia')->value('id'),
            ],
        ];

        foreach ($items as $data) {
            if (!isset($data['slug'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            Source::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
