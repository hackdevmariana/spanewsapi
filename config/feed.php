<?php

return [
    'feeds' => [
        'main' => [
            'items' => ['App\Models\Article', 'getFeedItems'],
            'url' => '/feed',
            'title' => 'Artículos de Noticias',
            'description' => 'Últimas noticias publicadas',
            'language' => 'es-ES',
            'format' => 'rss',
            'view' => 'feed::feed',
        ],
    ],
];
