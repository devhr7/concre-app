<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('dashboardCliente', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('cliente.dashboard');


Route::get('dashboardProveedor', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('proveedor.dashboard');



Route::get('dashboardEmpleado', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('empleado.dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


/** Core */
require __DIR__.'/core/core.php';



/** Areas */
// GTH
require __DIR__.'/areas/gth/empleados.php';
// PCM
require __DIR__.'/areas/pcm/pcm.php';