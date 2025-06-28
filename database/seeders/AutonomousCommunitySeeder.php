<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AutonomousCommunitySeeder extends Seeder
{
    public function run()
    {
        $communities = [
            'Andalucía',
            'Aragón',
            'Asturias',
            'Islas Baleares',
            'Canarias',
            'Cantabria',
            'Castilla-La Mancha',
            'Castilla y León',
            'Cataluña',
            'Comunidad Valenciana',
            'Extremadura',
            'Galicia',
            'La Rioja',
            'Comunidad de Madrid',
            'Región de Murcia',
            'Navarra',
            'País Vasco',
            'Ceuta',
            'Melilla',
        ];

        foreach ($communities as $name) {
            DB::table('autonomous_communities')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
