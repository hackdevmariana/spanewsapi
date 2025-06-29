<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SourceController;
use App\Http\Controllers\Api\V1\TagController;
use App\Http\Controllers\Api\V1\TopicController;
use App\Http\Controllers\Api\V1\AutonomousCommunityController;
use App\Http\Controllers\Api\V1\MunicipalityController;


Route::prefix('v1')->group(function () {
    Route::get('media', [SourceController::class, 'index']);
    Route::get('media/detail/{slug}', [SourceController::class, 'show']);
    Route::get('tags', [TagController::class, 'index']);
    Route::get('topics', [TopicController::class, 'index']);
    Route::get('regions', [AutonomousCommunityController::class, 'index']);
    Route::get('municipalities', [MunicipalityController::class, 'index']);
    Route::get('provinces/{slug}/municipalities', [MunicipalityController::class, 'byProvince']);
});
