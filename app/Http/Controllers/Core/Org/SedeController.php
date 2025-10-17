<?php

namespace App\Http\Controllers\Core\Org;

use App\Http\Requests\Core\Org\StoreSedeRequest;
use App\Http\Requests\Core\Org\UpdateSedeRequest;

use App\Http\Controllers\Controller;
use App\Models\Core\Org\Sede;
use Inertia\Inertia;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Core/Org/Sede/index');
    }

    public function datatable()
    {
        $sedes = Sede::select('id', 'nombre')->get();
        return response()->json(['data' => $sedes]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSedeRequest $request)
    {
        //
        // crear manualmente
        $sede = new Sede();
        // Asignación manual y normalización opcional
 
        $sede->nombre = trim((string) $request['nombre']);

        $sede->save();

        return response()->json(['ok' => true, 'id' => $sede->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sede $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sede $sede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateSedeRequest $request)
    {
        //
        $sede  = Sede::findOrFail($id);
        $sede->nombre = trim((string) $request['nombre']);
        $sede->save();
        return ['ok' => true];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sede $sede)
    {
        //
        $sede->delete();
        return response()->json(['ok' => true]);
    }
}
