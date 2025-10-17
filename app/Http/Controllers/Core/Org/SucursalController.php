<?php

namespace App\Http\Controllers\Core\Org;

use App\Http\Requests\Core\Org\StoreSucursalRequest;
use App\Http\Requests\Core\Org\UpdateSucursalRequest;
use App\Models\Core\Org\Sucursal;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Core/Org/Sucursal/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function datatable()
    {
        $query = Sucursal::with('sede:id,nombre')
            ->select(['id', 'nombre', 'sede_id'])
            ->get()
            ->map(function ($sucursal) {
                return [
                    'id' => $sucursal->id,
                    'nombre' => $sucursal->nombre,
                    'sede_id' => $sucursal->sede_id,
                    'sede_nombre' => $sucursal->sede ? $sucursal->sede->nombre : null,
                ];
            });
        return [
            'data' => $query,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSucursalRequest $request)
    {
        //
// crear manualmente
        $sucursal = new Sucursal();
        // Asignación manual y normalización opcional
 
        $sucursal->nombre = trim((string) $request['nombre']);
        $sucursal->sede_id = (int) $request['sede'];


        $sucursal->save();

        return response()->json(['ok' => true, 'id' => $sucursal->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,UpdateSucursalRequest $request)
    {
        //
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = trim((string) $request['nombre']);
        $sucursal->sede_id = (int) $request['sede'];
        $sucursal->save();
        return ['ok' => true];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        //
        $sucursal->delete();
        return response()->json(['ok' => true]);
    }
}
