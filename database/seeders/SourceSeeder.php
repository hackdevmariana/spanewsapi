<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\AutonomousCommunity;
use App\Models\Source;


/* USAGE:

    php artisan db:seed --class=SourceSeeder

*/

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name'               => 'Diario de Sevilla',
                'slug'               => 'diario-de-sevilla',
                'url'                => 'https://www.diariodesevilla.es/',
                'rss_url'            => 'https://www.diariodesevilla.es/feeds/',
                'editorial_email'    => 'redaccion@diariodesevilla.es',
                'commercial_email'   => 'publicidad@diariodesevilla.es',
                'type'               => 'digital',
                'geographic_scope'   => 'provincial',
                'main_topic'         => 'actualidad',
                'municipality_id'    => Municipality::where('name', 'Sevilla')->value('id'),
                'province_id'        => Province::where('slug', 'sevilla')->value('id'),
                'community_id'       => AutonomousCommunity::where('slug', 'andalucia')->value('id'),
            ],
            // … más medios progresivamente
        ];

        foreach ($items as $data) {
            $slug = $data['slug'];
            Source::updateOrCreate(
                ['slug' => $slug],
                $data
            );
        }
    }
}
