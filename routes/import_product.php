<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Import\ProductImportController;

Route::post('/import-product', [ProductImportController::class, 'store'])
    ->middleware('auth:sanctum')->name('import-product');
Route::post('/products', [ProductImportController::class, 'index'])
    ->middleware('auth:sanctum')->name('products');
