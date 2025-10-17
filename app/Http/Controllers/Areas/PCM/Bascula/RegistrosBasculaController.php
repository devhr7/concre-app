<?php

namespace App\Http\Controllers\Areas\PCM\Bascula;

use App\Models\Areas\PCM\Bascula\RegistrosBascula;


use App\Http\Requests\StoreRegistrosBasculaRequest;
use App\Http\Requests\UpdateRegistrosBasculaRequest;
use App\Http\Controllers\Controller;
use App\Models\Areas\PCM\Bascula\AlmBascula;
use App\Models\Areas\PCM\Bascula\VehiculoBascula;
use App\Models\Core\Geo\Municipio;
use App\Models\Core\MateriaPrima\MateriaPrima;
use App\Models\Core\Org\LineaProduccion;
use App\Models\Core\Terceros\Tercero;
use Database\Seeders\Core\Org\LineaProduccionSeeder;

class RegistrosBasculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // traer los registros de la bascula mapeados 
        $registros = RegistrosBascula::all();
        
        $options = [
            'municipios' => Municipio::options(null, null, ['Saldaña', 'Payande']),
            'destinos' => LineaProduccion::options(null, null, null),
            'almacen_basculas' => AlmBascula::options(),
            'proveedores' => Tercero::options(null, null,['Materia Prima']),
            'productos' => MateriaPrima::options(null, null, null),
            'transportistas' => Tercero::options(null, null, ['Transporte']),
            'vehiculos' => VehiculoBascula::vehiculosOptions(null, null, null),
            'conductores' => Tercero::options(null, null, ['Conductor Externo']),
        ];

        // retornar la vista con los registros
        return inertia('Areas/PCM/Bascula/RegistroBascula/index', [
            'registros' => $registros,
            'options' => $options,
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
    public function store(StoreRegistrosBasculaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrosBascula $registrosBascula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrosBascula $registrosBascula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrosBasculaRequest $request, RegistrosBascula $registrosBascula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrosBascula $registrosBascula)
    {
        //
    }
}
