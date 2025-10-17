<?php

namespace App\Http\Controllers\Core\Geo;


use App\Http\Controllers\Controller;
use App\Http\Requests\Core\Geo\StoreMunicipioRequest;
use App\Http\Requests\Core\Geo\UpdateMunicipioRequest;
use App\Models\Core\Geo\Municipio;


use Inertia\Inertia;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Core/Geo/Municipip/index');
    }

    public function datatable()
    {
        //departamento_id
        $query = Municipio::with('departamento:id,nombre')
            ->select(['id', 'nombre', 'departamento_id'])
            ->get()
            ->map(function ($municipio) {
            return [
                'id' => $municipio->id,
                'nombre' => $municipio->nombre,
                'departamento_id' => $municipio->departamento_id,
                'departamento_nombre' => $municipio->departamento ? $municipio->departamento->nombre : null,
            ];
            });
        return [
            'data' => $query,
        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
 
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMunicipioRequest $request)
    {
        //
    $mpio = new Municipio();
        // Asignación manual y normalización opcional
 
        $mpio->nombre = trim((string) $request['nombre']);
        $mpio->departamento_id = (int) $request['departamento_id'];

        $mpio->save();

        return response()->json(['ok' => true, 'id' => $mpio->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipio $municipio)
    {
        //
    }



    public function update($id, UpdateMunicipioRequest $request )
    {
        //
        $mpio  = Municipio::findOrFail($id);
        $mpio->nombre = trim((string) $request['nombre']);
        $mpio->departamento_id = (int) $request['departamento_id'];
        $mpio->save();
        return ['ok' => true];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipio $municipio)
    {
        //

        $municipio->delete();
        return response()->json(['ok' => true]);
    }
}
