<?php

namespace App\Http\Controllers\Core\Geo;

use App\Models\Core\Geo\Departamento;

use App\Http\Controllers\Controller;
use App\Http\Requests\Core\Geo\StoreDepartamentoRequest;
use App\Http\Requests\Core\Geo\UpdateDepartamentoRequest;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Core/Geo/Departamento/index'); //
    }

    public function list()
    {
        $query   = Departamento::select(['id', 'nombre'])->get();
        return [
            'data' => $query,
        ];
    }

    public function store(StoreDepartamentoRequest $request)
    {

        // crear manualmente
        $dep = new Departamento();
        // Asignación manual y normalización opcional
        $dep->pais_id = 1; // Colombia
        $dep->nombre = trim((string) $request['nombre']);

        $dep->save();

        return response()->json(['ok' => true, 'id' => $dep->id], 201);
    }

    public function update($id, UpdateDepartamentoRequest $request)
    {

        $dep  = Departamento::findOrFail($id);
        $dep->nombre = trim((string) $request['nombre']);
        $dep->save();
        return ['ok' => true];
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(['ok' => true]);
    }
}
