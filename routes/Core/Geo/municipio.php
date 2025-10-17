<?php

use App\Http\Controllers\Core\Geo\MunicipioController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('geo')->name('geo.')->group(function () {
    // Página Inertia
    Route::get('/municipio', [MunicipioController::class, 'index'])->name('municipio.index');

    // Data para DataTable (server-side)
    Route::get('/municipio/datatable', [MunicipioController::class, 'datatable'])->name('municipio.datatable');

    // CRUD básico
    Route::post('/municipio', [MunicipioController::class, 'store'])->name('municipio.store');
    Route::put('/municipio/{id}', [MunicipioController::class, 'update'])->name('municipio.update');
    Route::delete('/municipio/{municipio}', [MunicipioController::class, 'destroy'])->name('municipio.destroy');

    // Options para <Select>
    Route::get('/options/municipio', [MunicipioController::class, 'options'])->name('municipio.options');
});
