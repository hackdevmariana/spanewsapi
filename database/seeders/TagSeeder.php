<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'elecciones',
            'crimen',
            'empleo',
            'economía local',
            'protestas',
            'accidentes',
            'fútbol',
            'cine',
            'música',
            'turismo',
            'energía solar',
            'energía eólica',
            'energía hidráulica',
            'energía',
            'educación',
            'bitcoin',
            'gastronomíma',
            'mundo rural',
            'vino',
            'agricultura',
            'decoración',
            'banco central',
            'economía',
            'startups',
            'toros',
            'emprendimiento',
            'fiestas',
            'ganadería',
            'música',
            'baloncesto',
            'tenis',
            'rugby',
            'boxeo',
            'karata',
            'cine',
            'teatro',
            'youtube',
            'instagram',
            'twitter',
            'redes sociales',
            'tiktok',
        ];

        foreach ($tags as $name) {
            Tag::updateOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            );
        }
    }
}
