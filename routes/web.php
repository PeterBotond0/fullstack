<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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