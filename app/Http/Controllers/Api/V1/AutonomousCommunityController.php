<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AutonomousCommunity;

class AutonomousCommunityController extends Controller
{
    public function index()
    {
        $regions = AutonomousCommunity::with(['provinces' => function ($query) {
            $query->orderBy('name')->select('name', 'slug', 'autonomous_community_id');
        }])
            ->orderBy('name')
            ->get(['id', 'name', 'slug']); // ¡necesitamos el id para que funcione la relación!

        // Ocultamos el id de las comunidades y el foreign key de las provincias
        $regions->makeHidden(['id'])->each(function ($region) {
            $region->provinces->makeHidden(['autonomous_community_id']);
        });

        return response()->json([
            'data' => $regions,
        ]);
    }
}
