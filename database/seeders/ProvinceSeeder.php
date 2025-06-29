<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\AutonomousCommunity;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'Almería', 'community_slug' => 'andalucia'],
            ['name' => 'Cádiz', 'community_slug' => 'andalucia'],
            ['name' => 'Córdoba', 'community_slug' => 'andalucia'],
            ['name' => 'Granada', 'community_slug' => 'andalucia'],
            ['name' => 'Huelva', 'community_slug' => 'andalucia'],
            ['name' => 'Jaén', 'community_slug' => 'andalucia'],
            ['name' => 'Málaga', 'community_slug' => 'andalucia'],
            ['name' => 'Sevilla', 'community_slug' => 'andalucia'],

            ['name' => 'Huesca', 'community_slug' => 'aragon'],
            ['name' => 'Teruel', 'community_slug' => 'aragon'],
            ['name' => 'Zaragoza', 'community_slug' => 'aragon'],

            ['name' => 'Asturias', 'community_slug' => 'asturias'],

            ['name' => 'Islas Baleares', 'community_slug' => 'islas-baleares'],

            ['name' => 'Las Palmas', 'community_slug' => 'canarias'],
            ['name' => 'Santa Cruz de Tenerife', 'community_slug' => 'canarias'],

            ['name' => 'Cantabria', 'community_slug' => 'cantabria'],

            ['name' => 'Albacete', 'community_slug' => 'castilla-la-mancha'],
            ['name' => 'Ciudad Real', 'community_slug' => 'castilla-la-mancha'],
            ['name' => 'Cuenca', 'community_slug' => 'castilla-la-mancha'],
            ['name' => 'Guadalajara', 'community_slug' => 'castilla-la-mancha'],
            ['name' => 'Toledo', 'community_slug' => 'castilla-la-mancha'],

            ['name' => 'Ávila', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Burgos', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'León', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Palencia', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Salamanca', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Segovia', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Soria', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Valladolid', 'community_slug' => 'castilla-y-leon'],
            ['name' => 'Zamora', 'community_slug' => 'castilla-y-leon'],

            ['name' => 'Barcelona', 'community_slug' => 'cataluna'],
            ['name' => 'Girona', 'community_slug' => 'cataluna'],
            ['name' => 'Lleida', 'community_slug' => 'cataluna'],
            ['name' => 'Tarragona', 'community_slug' => 'cataluna'],

            ['name' => 'Alicante', 'community_slug' => 'comunidad-valenciana'],
            ['name' => 'Castellón', 'community_slug' => 'comunidad-valenciana'],
            ['name' => 'Valencia', 'community_slug' => 'comunidad-valenciana'],

            ['name' => 'Badajoz', 'community_slug' => 'extremadura'],
            ['name' => 'Cáceres', 'community_slug' => 'extremadura'],

            ['name' => 'A Coruña', 'community_slug' => 'galicia'],
            ['name' => 'Lugo', 'community_slug' => 'galicia'],
            ['name' => 'Ourense', 'community_slug' => 'galicia'],
            ['name' => 'Pontevedra', 'community_slug' => 'galicia'],

            ['name' => 'La Rioja', 'community_slug' => 'la-rioja'],

            ['name' => 'Madrid', 'community_slug' => 'comunidad-de-madrid'],

            ['name' => 'Murcia', 'community_slug' => 'region-de-murcia'],

            ['name' => 'Navarra', 'community_slug' => 'navarra'],

            ['name' => 'Álava', 'community_slug' => 'pais-vasco'],
            ['name' => 'Guipúzcoa', 'community_slug' => 'pais-vasco'],
            ['name' => 'Vizcaya', 'community_slug' => 'pais-vasco'],

            ['name' => 'Ceuta', 'community_slug' => 'ceuta'],
            ['name' => 'Melilla', 'community_slug' => 'melilla'],
        ];

        foreach ($provinces as $province) {
            $community = AutonomousCommunity::where('slug', $province['community_slug'])->first();

            if ($community) {
                DB::table('provinces')->insert([
                    'name' => $province['name'],
                    'slug' => Str::slug($province['name']),
                    'autonomous_community_id' => $community->id,
                ]);
            }
        }
    }
}
