<?php

use App\Http\Controllers\Core\OptionsController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('options')->name('options.')->group(function () {
    Route::post('/pcm/bascula/vehiculosoptions', [OptionsController::class, 'vehiculosBascula'])->name('pcm.bascula.vehiculosoptions');
});