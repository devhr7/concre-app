<?php


use App\Http\Controllers\Core\Org\SucursalController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('org')->name('org.')->group(function () {
    // Página Inertia
    Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal.index');

    // Data para DataTable (server-side)
    Route::get('/sucursal/datatable', [SucursalController::class, 'datatable'])->name('sucursal.datatable');

    // CRUD básico
    Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::put('/sucursal/{id}', [SucursalController::class, 'update'])->name('sucursal.update');
    Route::delete('/sucursal/{sucursal}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');

    // Options para <Select>
    Route::get('/options/sucursal', [SucursalController::class, 'options'])->name('sucursal.options');
});
