<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PublicOrderController;
use App\Http\Controllers\Api\SecurityController;
use App\Http\Controllers\Api\CodPaymentController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('dashboard')->group(function (): void {
        Route::get('/summary', [DashboardController::class, 'summary']);
        Route::get('/order-flow', [DashboardController::class, 'orderFlow']);
        Route::get('/domain-performance', [DashboardController::class, 'domainPerformance']);
        Route::get('/recent-activities', [DashboardController::class, 'recentActivities']);
    });

    Route::apiResource('domains', DomainController::class)->only(['index', 'store', 'show', 'update']);
    Route::apiResource('products', ProductController::class);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);

    Route::get('/logistics/cod-payments', [CodPaymentController::class, 'index']);
    Route::get('/logistics/cod-payments/summary', [CodPaymentController::class, 'summary']);

    Route::get('/security/fraud/orders', [SecurityController::class, 'fraudOrders']);
});

Route::prefix('public')->group(function (): void {
    Route::post('/order', [PublicOrderController::class, 'store']);
    Route::get('/site-config', [PublicOrderController::class, 'siteConfig']);
    Route::get('/product', [PublicOrderController::class, 'product']);
});
