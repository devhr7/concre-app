<?php

use App\Http\Controllers\Core\Org\SedeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('org')->name('org.')->group(function () {
    // Página Inertia
    Route::get('/sede', [SedeController::class, 'index'])->name('sede.index');

    // Data para DataTable (server-side)
    Route::get('/sede/datatable', [SedeController::class, 'datatable'])->name('sede.datatable');

    // CRUD básico
    Route::post('/sede', [SedeController::class, 'store'])->name('sede.store');
    Route::put('/sede/{id}', [SedeController::class, 'update'])->name('sede.update');
    Route::delete('/sede/{sede}', [SedeController::class, 'destroy'])->name('sede.destroy');

    // Options para <Select>
    Route::get('/options/sede', [SedeController::class, 'options'])->name('sede.options');
});
