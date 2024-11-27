<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect("/series");
});

// Route::resource("/series", SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
// Route::resource("/series", SeriesController::class)->except(['show');

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/store', 'store')->name('series.store');
    Route::get('/series/edit/{id}', 'edit')->name('series.edit');
    Route::delete('/series/destroy/{id}', 'destroy')->name('series.destroy');
    Route::put('/series/update/{id}', 'update')->name('series.update');
});
