<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/new', [ProductsController::class, 'create']);
Route::post('/products/new', [ProductsController::class, 'store']);

Route::get('/products/update/{id}', [ProductsController::class, 'edit']);
Route::post('/products/update/', [ProductsController::class, 'update']);

Route::get('/products/delete/{id}', [ProductsController::class, 'destroy']);

Route::get('/types', [TypesController::class, 'index']);
Route::get('/types/new', [TypesController::class, 'create']);
Route::post('/types/new', [TypesController::class, 'store']);
Route::get('/types/update/{id}', [TypesController::class, 'edit']);
Route::post('/types/update/', [TypesController::class, 'update']);
Route::get('/types/delete/{id}', [TypesController::class, 'destroy']);

Route::get('/suppliers', [SuppliersController::class, 'index']);
Route::get('/suppliers/new', [SuppliersController::class, 'create']);
Route::post('/suppliers/new', [SuppliersController::class, 'store']);
Route::get('/suppliers/update/{id}', [SuppliersController::class, 'edit']);
Route::post('/suppliers/update/', [SuppliersController::class, 'update']);
Route::get('/suppliers/delete/{id}', [SuppliersController::class, 'destroy']);