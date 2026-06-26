<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Api\AuthController;

// Protected cart & promo routes
Route::prefix('v1')->middleware('apikey')->group(function () {
    Route::post('/carts', [CartController::class, 'store']);

    Route::delete('/carts/{id}', [CartController::class, 'destroy']);

    Route::get('/carts/{id}', [CartController::class, 'show']);

    Route::get('/promo', [PromoController::class, 'index']);

    Route::get('/promo/{id}', [PromoController::class, 'show']);

    Route::post('/promo/apply', [PromoController::class, 'apply']);
    Route::get('/products', [CartController::class, 'products']);

   
});

// Auth routes (public)
Route::prefix('v1/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected auth routes
Route::prefix('v1/auth')->middleware('jwt.auth')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
});

