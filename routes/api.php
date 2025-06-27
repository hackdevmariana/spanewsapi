<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SourceController;

Route::prefix('v1')->group(function () {
    Route::get('media', [SourceController::class, 'index']);
});
