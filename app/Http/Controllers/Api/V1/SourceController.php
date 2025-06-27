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
        $sources = Source::with('municipality')->get();
        return SourceResource::collection($sources);
    }

    public function show($slug)
    {
        try {
            $source = Source::with('municipality')
                ->where('slug', $slug)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return new SourceResource($source);
    }
}
