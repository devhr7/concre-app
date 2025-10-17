<?php

namespace App\Models\Core\Terceros;

use App\Models\Areas\PCM\Bascula\VehiculoBascula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\Attributes\Before;

class Tercero extends Model
{
    //
    protected $table = 'terceros';
    protected $fillable = [
        'is_active',
        'identificacion',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'razon_social',
        'direccion',
        'telefono',
        'email',
        'tipo_documento_id',
        'pais_id',
        'departamento_id',
        'municipios_id',
    ];

    public function tipo_documento():BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function Tipos():BelongsToMany
    {
        return $this->belongsToMany(TipoTercero::class, 'tercero__tipo_terceros', 'tercero_id', 'tipo_tercero_id');
    }

    public function Terceros_TipoTercero():HasMany
    {
        return $this->hasMany(Tercero_TipoTercero::class, 'tercero_id');
    }

    // Tercero Has TipoProveedor
    public function Terceros_TipoProveedor():HasMany
    {
        return $this->hasMany(TerceroHasTipoproveedor::class, 'tercero_id');
    }

    public function TercerosHasTipoproveedor():HasMany
    {
        return $this->hasMany(TerceroHasTipoproveedor::class, 'tercero_id');
    }

    public function VehiculosBascula():HasMany
    {
        return $this->hasMany(VehiculoBascula::class, 'tercero_id');
    }




    /**
     * Creacion de opciones para select
     * $tipo_tercero = array [ 'Cliente', 'Proveedor' ]  
     * $tipo_proveedor = array [ 'Materia Prima', 'Servicio', 'Producto' ] Tercero Has Tipoproveedor
     *  pero sino lo encuentra no filtrar nada.
     */
    public static function options($tercero_id = null, $tipo_tercero = null, $tipo_proveedor = null)
    {
        $query = self::query();

        // Filtrar por id si se proporciona
        if ($tercero_id) {
            $query->where('id', $tercero_id);
        }

        // Filtrar por tipo de tercero si se proporciona
        if ($tipo_tercero) {
            $tipoTercero = \App\Models\Core\Terceros\TipoTercero::where('nombre', $tipo_tercero)->first();
            if ($tipoTercero) {
                $query->whereHas('Terceros_TipoTercero', function ($q) use ($tipoTercero) {
                    $q->where('tipo_tercero_id', $tipoTercero->id);
                });
            }
        }

        // Filtrar por tipo de proveedor si se proporciona
        if ($tipo_proveedor) {
            $tipoProveedor = \App\Models\Core\Terceros\TipoProveedor::where('nombre', $tipo_proveedor)->first();
            if ($tipoProveedor) {
                $query->whereHas('Terceros_TipoProveedor', function ($q) use ($tipoProveedor) {
                    $q->where('tipoproveedor_id', $tipoProveedor->id);
                });
            }
        }

        return $query->orderBy('nombre1')->get()->map(function ($tercero) {
            $nombre = $tercero->razon_social 
                ? $tercero->razon_social 
                : trim($tercero->nombre1 . ' ' . $tercero->apellido1);
            return [
                'name' => $tercero->identificacion . " - " . $nombre,
                'identificacion' => $tercero->identificacion,
                'value' => $tercero->id,
            ];
        })->toArray();
    }



}
