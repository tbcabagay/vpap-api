<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {
//    Route::get('/event/{id}', [EventController::class, 'show'])->where('id', '[0-9]+');
    Route::get('/event/latest', [EventController::class, 'latest']);
});
