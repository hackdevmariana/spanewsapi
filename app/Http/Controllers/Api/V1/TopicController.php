<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Topic::select('name', 'slug')
                ->orderBy('name')
                ->get(),
        ]);
    }
}
