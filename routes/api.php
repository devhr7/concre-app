<?php

//use App\Http\Controllers\Core\OptionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/api/options.php';

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



/** 

Route::middleware('auth:sanctum')->prefix('options')->name('options.')->group(function () {
    Route::post('/pcm/bascula/vehiculosoptions', [OptionsController::class, 'vehiculosBascula'])->name('pcm.bascula.vehiculosoptions');
});

**/