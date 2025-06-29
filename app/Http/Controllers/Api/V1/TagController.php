<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Tag::select('name', 'slug')
                ->orderBy('name')
                ->get(),
        ]);
    }
}
