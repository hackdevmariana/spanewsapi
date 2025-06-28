<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Http\Resources\SourceResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::with(['municipality', 'province.community'])->get();
        return SourceResource::collection($sources);
    }

    public function show($slug)
    {
        $source = Source::with(['municipality', 'province.community'])
            ->where('slug', $slug)
            ->first();

        if (! $source) {
            return response()->json(['message' => 'Source not found'], 404);
        }

        return new SourceResource($source);
    }
}
