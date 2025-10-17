<?php


use App\Http\Controllers\Core\Org\LineaProduccionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('org')->name('org.')->group(function () {
    // Página Inertia
    Route::get('/planta', [LineaProduccionController::class, 'index'])->name('planta.index');

    // Data para DataTable (server-side)
    Route::get('/planta/datatable', [LineaProduccionController::class, 'datatable'])->name('planta.datatable');

    // CRUD básico
    Route::post('/planta', [LineaProduccionController::class, 'store'])->name('planta.store');
    Route::put('/planta/{id}', [LineaProduccionController::class, 'update'])->name('planta.update');
    Route::delete('/planta/{lineaProduccion}', [LineaProduccionController::class, 'destroy'])->name('planta.destroy');

});
