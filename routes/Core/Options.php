<?php

use App\Http\Controllers\Core\OptionsController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->prefix('options/geo')->name('options.geo.')->group(function () {
    Route::post('/departamentos', [OptionsController::class, 'departamentos'])->name('departamentos');
    Route::post('/municipios', [OptionsController::class, 'distritos'])->name('municipios');
});

Route::middleware('auth:sanctum')->prefix('options/org')->name('options.org.')->group(function () {
    Route::post('/sedes', [OptionsController::class, 'Sede'])->name('sede');
    Route::post('/sucursal', [OptionsController::class, 'Sucursal'])->name('sucursal');
    Route::post('/planta', [OptionsController::class, 'planta'])->name('planta');
});


/** 
 * 
 * Route::middleware('auth:sanctum')->prefix('options')->name('options.')->group(function () {
    Route::post('/pcm/bascula/vehiculosoptions', [OptionsController::class, 'vehiculosBascula'])->name('pcm.bascula.vehiculosoptions');
});
**/