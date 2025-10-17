<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Areas\PCM\Bascula\VehiculoBascula;
use App\Models\Core\Geo\Departamento;
use App\Models\Core\Geo\Municipio;
use App\Models\Core\Org\Sede;
use App\Models\Core\Org\Sucursal;

class OptionsController extends Controller
{


    /** Organizacional */
    // Sede
    public function Sede(Request $request)
    {   
        $data = $request->validate([
            'id'       => ['nullable', 'integer'],
            'sedes'    => ['nullable', 'array'],
            'sedes.*'  => ['string', 'max:100'],
   
        ]);

        $q = Sede::query()->select(['id','nombre']);
        if (!empty($data['id'])) {
            $q->where('id', $data['id']);
        }
        if (!empty($data['sedes'])) {
            $q->whereIn('nombre', $data['sedes']);
        }
        $items = $q->orderBy('nombre')->get();
        return [
            'data' => $items->map(fn($s) => [
                'value' => $s->id,
                'label' => $s->nombre ,
            ]),
            'meta' => ['total' => $items->count()],
        ];
    }
    // Sucursal
    public function Sucursal(Request $request)
    {   
        $data = $request->validate([
            'id'         => ['nullable', 'integer'],
            'sucursales' => ['nullable', 'array'],
            'sucursales.*' => ['string', 'max:100'],
        ]);
        $items = Sucursal::query()->select(['id','nombre','sede_id']);
        if (!empty($data['id'])) {
            $items->where('id', $data['id']);
        }
        if (!empty($data['sucursales'])) {
            $items->whereIn('nombre', $data['sucursales']);
        }
        $items = $items->orderBy('nombre')->get();
        return [
            'data' => $items->map(fn($s) => [
                'value' => $s->id,
                'label' => $s->nombre . ' - ' . $s->sede->nombre,
            ]),
            'meta' => ['total' => $items->count()],
        ];
        

    }
    // LineaProduccion
    public function planta(Request $request)
    {   
        $data = $request->validate([
            'id'              => ['nullable', 'integer'],
            'sucursal_id'    => ['nullable', 'integer'],
            'lineasProduccion' => ['nullable', 'array'],
            'lineasProduccion.*' => ['string', 'max:100'],
        ]);

        $items = Sucursal::options(
            $data['id'] ?? null,
            $data['sucursal_id'] ?? null,
            $data['lineasProduccion'] ?? null
        );

        return [
            'data' => $items,
            'meta' => ['total' => count($items)],
        ];
    }

    /*** UBICACION */
    public function departamentos(Request $request)
    {
        $data = $request->validate([
            'id'           => ['nullable', 'integer'],
            'departamentos'=> ['nullable', 'array'],
            'departamentos.*' => ['string', 'max:100'],
        ]);

        $q = Departamento::query()->select(['id','nombre']);

        if (!empty($data['id'])) {
            $q->where('id', $data['id']);
        }

        if (!empty($data['departamentos'])) {
            $q->whereIn('nombre', $data['departamentos']);
        }

        $items = $q->orderBy('nombre')->get();

        return [
            'data' => $items->map(fn($d) => [
                'value' => $d->id,
                'label' => $d->nombre,
            ]),
            'meta' => ['total' => $items->count()],
        ];
    }

    public function municipios(Request $request)
    {
        $data = $request->validate([
            'id'             => ['nullable','integer'],
            'departamento_id'=> ['nullable','integer'],
            'municipios'    => ['nullable','array'],
            'municipios.*'  => ['string','max:100'],
        ]);

        $items = Municipio::options(
            $data['id'] ?? null,
            $data['departamento_id'] ?? null,
            $data['municipios'] ?? null
        );

        return [
            'data' => $items,
            'meta' => ['total' => count($items)],
        ];
    }



    /*** 
     * PCM
     */

    // Vehículos de báscula
    public function vehiculosBascula(Request $request)
    {
        $data = $request->validate([
            'id'         => ['nullable','integer'],
            'tercero_id' => ['nullable','integer'],
            'placas'     => ['nullable','array'],
            'placas.*'   => ['string','max:20'],
        ]);

        // Normaliza placas (si vienen)
        if (!empty($data['placas'])) {
            $data['placas'] = array_values(array_filter(array_map(
                fn($p) => strtoupper(trim((string)$p)), $data['placas']
            )));
        }

        // Query simple (puedes mover a scopes si prefieres)
        $q = VehiculoBascula::query()->select(['id','placa']);
        if (!empty($data['id']))         { $q->where('id', $data['id']); }
        if (!empty($data['tercero_id'])) { $q->where('tercero_id', $data['tercero_id']); }
        if (!empty($data['placas']))     { $q->whereIn('placa', $data['placas']); }

        $items = $q->orderBy('placa')->get();

        // Transform estándar para todos tus Selects
        return [
            'data' => $items->map(fn($v) => [
                'value' => $v->id,
                'label' => $v->placa,
            ]),
            'meta' => ['total' => $items->count()],
        ];
    }
}
