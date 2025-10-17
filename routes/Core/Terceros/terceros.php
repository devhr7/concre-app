<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Core\Terceros\TerceroController;

// prefijo terceros
Route::prefix('terceros')->group(function () {
    Route::get('/', [TerceroController::class, 'index'])->name('terceros.index');
    //Route::get('/create', [TerceroController::class, 'create'])->name('terceros.create');
    //Route::post('/', [TerceroController::class, 'store'])->name('terceros.store');
    //Route::get('/{tercero}', [TerceroController::class, 'show'])->name('terceros.show');
    Route::get('/{tercero}/edit', [TerceroController::class, 'edit'])->name('terceros.edit');
    
    //Route::put('/{tercero}', [TerceroController::class, 'update'])->name('terceros.update');
    //Route::delete('/{tercero}', [TerceroController::class, 'destroy'])->name('terceros.destroy');
});


