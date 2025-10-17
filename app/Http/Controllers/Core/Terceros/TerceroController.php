<?php

namespace App\Http\Controllers\Core\Terceros;


use App\Http\Requests\StoreTerceroRequest;
use App\Http\Requests\UpdateTerceroRequest;
use App\Http\Controllers\Controller;
use App\Models\Core\Terceros\Tercero;

class TerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // traer todos los terceros-> mappear para traer el tipo de tercero y si es persona natural o juridica
        //ademas traer el nombre completo o razon social segun sea el caso
        $data = Tercero::with('tipos')->get()->map(function ($tercero) {
            $tipo_tercero = $tercero->tipos->pluck('nombre')->join(', '); // Obtener los nombres de los tipos de tercero y unirlos en una cadena
            $tipo_persona = ($tercero->tipo_documento && in_array($tercero->tipo_documento->codigo, ['CC', 'CE', 'TI'])) ? 'Natural' : 'Juridica';
            $nombre = $tipo_persona === 'Natural' ? trim("{$tercero->nombre1} {$tercero->nombre2} {$tercero->apellido1} {$tercero->apellido2}") : $tercero->razon_social;

            return [
                'id' => $tercero->id,
                'Tipo_Tercero' => $tipo_tercero,
                'TipoPersona' => $tipo_persona,
                'identificacion' => $tercero->identificacion,
                'nombre' => $nombre,
                'direccion' => $tercero->direccion,
                'telefono' => $tercero->telefono,
                'email' => $tercero->email,
            ];
        });

        return inertia('Core/Terceros/index', [
            'data' => $data,
        ]);
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
    public function store(StoreTerceroRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tercero $tercero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tercero $tercero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTerceroRequest $request, Tercero $tercero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tercero $tercero)
    {
        //
    }
}
