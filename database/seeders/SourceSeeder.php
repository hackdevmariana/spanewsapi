<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipality;
use App\Models\Source;

/* Usage:

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
                'name' => 'Diario de Sevilla',
                'slug' => 'diario-de-sevilla',
                'url' => 'https://www.diariodesevilla.es/',
                'rss_url' => 'https://www.diariodesevilla.es/feeds/',
                'contact_email' => 'redaccion@diariodesevilla.es',
                'type' => 'digital',
                'geographic_scope' => 'provincial',
                'main_topic' => 'actualidad',
                'municipality_id' => Municipality::where('name', 'Sevilla')->value('id'),
            ],
            // ... otros medios
        ];

        foreach ($items as $data) {
            Source::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
