<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Http\Resources\SourceResource;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::with('municipality')->get();
        return SourceResource::collection($sources);
    }
}
