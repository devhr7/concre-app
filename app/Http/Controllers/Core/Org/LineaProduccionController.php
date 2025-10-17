<?php

namespace App\Http\Controllers\Core\Org;

use App\Http\Requests\Core\Org\StoreLineaProduccionRequest;
use App\Http\Requests\Core\Org\UpdateLineaProduccionRequest;
use App\Models\Core\Org\LineaProduccion;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class LineaProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Core/Org/Planta/index');
    }

    public function datatable()
    {
        $lineasProduccion = LineaProduccion::with('sucursal:id,nombre')
            ->select(['id', 'nombre', 'codigo', 'sucursal_id'])
            ->get()
            ->map(function ($linea) {
                return [
                    'id' => $linea->id,
                    'nombre' => $linea->nombre,
                    'codigo' => $linea->codigo,
                    'sucursal_id' => $linea->sucursal_id,
                    'sucursal_nombre' => $linea->sucursal ? $linea->sucursal->nombre : null,
                ];
            });
        return [
            'data' => $lineasProduccion,
        ];
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
    public function store(StoreLineaProduccionRequest $request)
    {
        //
        $lineaProduccion = new LineaProduccion();
        // Asignación manual y normalización opcional
        $lineaProduccion->nombre = trim((string) $request['nombre']);
        $lineaProduccion->codigo = trim((string) $request['codigo']);
        $lineaProduccion->sucursal_id = (int) $request['sucursal_id'];
        $lineaProduccion->save();
        return ['ok' => true];
    }

    /**
     * Display the specified resource.
     */
    public function show(LineaProduccion $lineaProduccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineaProduccion $lineaProduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateLineaProduccionRequest $request)
    {
        //
        $lineaProduccion = LineaProduccion::find($id);
        if (!$lineaProduccion) {
            return response()->json(['error' => 'Linea de Produccion not found'], 404);
        }
        $lineaProduccion->nombre = trim((string) $request['nombre']);
        $lineaProduccion->codigo = trim((string) $request['codigo']);
        $lineaProduccion->sucursal_id = (int) $request['sucursal_id'];
        $lineaProduccion->save();
        return ['ok' => true];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineaProduccion $lineaProduccion)
    {
        //
        $lineaProduccion->delete();
        return response()->json(['ok' => true]);
    }
}
