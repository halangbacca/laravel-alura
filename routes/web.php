<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/series', action: [SeriesController::class, 'index'])->name('index');
Route::get('/series/criar', action: [SeriesController::class, 'create'])->name('create');
Route::post('/series/salvar', action: [SeriesController::class, 'store'])->name('store');