<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PromoController;

Route::prefix('v1')->group(function () {

    Route::get('/products', [CartController::class, 'products']);

    Route::post('/carts', [CartController::class, 'store']);

    Route::delete('/carts/{id}', [CartController::class, 'destroy']);

    Route::get('/carts/{id}', [CartController::class, 'show']);

    Route::get('/promo', [PromoController::class, 'index']);

    Route::get('/promo/{id}', [PromoController::class, 'show']);

    Route::post('/promo/apply', [PromoController::class, 'apply']);
});