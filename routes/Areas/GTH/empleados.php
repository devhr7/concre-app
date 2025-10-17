<?php 

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// prefijo GTH
Route::get('c', function () {
    return Inertia::render('Areas/GTH/Empleados/index');
})->middleware(['auth', 'verified'])->name('gth.empleados.index');