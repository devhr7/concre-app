<?php

use App\Http\Controllers\Core\Geo\DepartamentoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('geo')->name('geo.')->group(function () {
    // Página Inertia
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');

    // Data para DataTable (server-side)
    Route::get('/departamentos/list', [DepartamentoController::class, 'list'])->name('departamentos.list');

    // CRUD básico
    Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
    Route::put('/departamentos/{id}', [DepartamentoController::class, 'update'])->name('departamentos.update');
    Route::delete('/departamentos/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

    // Options para <Select>
    Route::get('/options/departamentos', [DepartamentoController::class, 'options'])->name('departamentos.options');
});
