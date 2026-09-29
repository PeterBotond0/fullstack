<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlcoholController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return 'Működik a Laravel!';
});

Route::get('/alcohols', [AlcoholController::class, 'index'])
    ->name('alcohols.index');

Route::get('/alcohols/create', [AlcoholController::class, 'create'])
    ->name('alcohols.create');

Route::post('/alcohols', [AlcoholController::class, 'store'])
    ->name('alcohols.store');

Route::get('/alcohols/{alcohol}', [AlcoholController::class, 'show'])
    ->name('alcohols.show');

Route::get('/alcohols/{alcohol}/edit', [AlcoholController::class, 'edit'])
    ->name('alcohols.edit');

Route::patch('/alcohols/{alcohol}', [AlcoholController::class, 'update'])
    ->name('alcohols.update');

Route::delete('/alcohols/{alcohol}', [AlcoholController::class, 'destroy'])
    ->name('alcohols.destroy');



Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::patch('/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');