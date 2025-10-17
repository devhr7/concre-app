<?php

// Traer la vista del controllador RegistrosBasculaController
use App\Http\Controllers\Areas\PCM\Bascula\RegistrosBasculaController;
use App\Models\Areas\PCM\Bascula\AlmBascula;
use App\Models\Areas\PCM\Bascula\VehiculoBascula;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;

use Inertia\Inertia;


// Options de vehiculos

// Prefijo Bascula


Route::middleware(['auth'])->prefix('pcm')->name('pcm.')->group(function () {
        Route::prefix('bascula')->name('bascula.')->group(function () {
             Route::get('/registro-bascula', [RegistrosBasculaController::class, 'index'])->name('registrobascula.index')->middleware('permission:pcm.bascula.registrobasula.view');
        });
});

/** 
Route::prefix('pcm/bascula/registro-bascula')->group(function () {
    Route::get('/', [RegistrosBasculaController::class, 'index'])->name('bascula.index');
    

    // Api
    //Trae vehiculosOptions($id = null, $tercero_id = null, $placas = null) del modelo VehiculoBascula y lo retorna en json POST
    // Ruta directamente del modelo VehiculoBascula
    Route::post('/vehiculosOptions', function (Request $request) {
        return VehiculoBascula::vehiculosOptions($request->id, $request->tercero_id, $request->placas);
    })->name('bascula.vehiculosOptions');
    Route::post('/AlmBasculaOptions', function (Request $request) {
        return AlmBascula::options($request->alm_bascula_id, $request->linea_produccion_id, $request->producto_id, $request->alm_basculas);
    })->name('bascula.AlmBasculaOptions');


})->middleware(['auth', 'verified']);

**/