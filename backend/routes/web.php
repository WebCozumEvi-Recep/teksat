<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::middleware(['resolve.domain'])->group(function () {
    Route::get('/{any?}', [LandingController::class, 'show'])->where('any', '.*');
});
