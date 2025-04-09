<?php

use App\Http\Controllers\Import\ProductImportController;
use Illuminate\Support\Facades\Route;

Route::post('/import-product', [ProductImportController::class, 'store'])
    ->middleware('auth:sanctum')->name('import-product');
Route::get('/products', [ProductImportController::class, 'index'])
    ->middleware('auth:sanctum')->name('products');
