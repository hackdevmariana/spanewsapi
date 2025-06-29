<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use App\Models\Province;


class MunicipalityController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::with('province')
            ->orderBy('name')
            ->get(['name', 'slug', 'province_id']);

        $municipalities->each(function ($municipality) {
            $municipality->makeHidden(['province_id']);
            $municipality->province->makeHidden(['id', 'autonomous_community_id', 'created_at', 'updated_at']);
        });

        return response()->json([
            'data' => $municipalities,
        ]);
    }

    public function byProvince($slug)
    {
        $province = Province::where('slug', $slug)->firstOrFail();

        $municipalities = $province->municipalities()
            ->orderBy('name')
            ->get(['name', 'slug']);

        return response()->json([
            'province' => [
                'name' => $province->name,
                'slug' => $province->slug,
            ],
            'municipalities' => $municipalities,
        ]);
    }
}
