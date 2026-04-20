<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\LogisticsController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\FraudController;
use App\Http\Controllers\Api\SettingsController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::apiResource('domains', DomainController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class)->only(['index', 'show', 'update']);

    Route::prefix('logistics')->group(function () {
        Route::get('/shipments', [LogisticsController::class, 'shipments']);
        Route::post('/shipments/{shipment}/status', [LogisticsController::class, 'updateShipmentStatus']);
        Route::get('/cod-collections', [LogisticsController::class, 'codCollections']);
        Route::post('/reconciliations', [LogisticsController::class, 'createReconciliationBatch']);
    });

    Route::get('/reports/overview', [ReportController::class, 'overview']);
    Route::get('/reports/domains', [ReportController::class, 'domains']);

    Route::get('/fraud/risk-orders', [FraudController::class, 'riskOrders']);
    Route::post('/fraud/blacklist', [FraudController::class, 'storeBlacklist']);

    Route::get('/settings', [SettingsController::class, 'index']);
    Route::put('/settings', [SettingsController::class, 'update']);
});
