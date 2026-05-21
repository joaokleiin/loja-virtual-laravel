<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsControllerApi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('loginapi', [ProductsControllerApi::class, 'loginapi']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('products', [ProductsControllerApi::class, 'index']);

    Route::post('products', [ProductsControllerApi::class, 'store']);

    Route::put('products/{id}', [ProductsControllerApi::class, 'update']);

    Route::delete('products/{id}', [ProductsControllerApi::class, 'destroy']);

    Route::post('products', [ProductsControllerApi::class, 'store']);
});