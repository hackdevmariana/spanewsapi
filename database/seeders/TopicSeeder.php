<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            'Actualidad',
            'Política',
            'Economía',
            'Sociedad',
            'Cultura',
            'Deportes',
            'Tecnología',
            'Ciencia',
            'Salud',
            'Educación',
            'Internacional',
            'Opinión',
            'Medio ambiente',
            'Sucesos',
        ];

        foreach ($topics as $name) {
            Topic::updateOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            );
        }
    }
}
