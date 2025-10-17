<?php

namespace App\Models\Areas\PCM\Bascula;

use Illuminate\Database\Eloquent\Model;

class RegistrosBascula extends Model
{
    //

    protected $table = 'registros_basculas';
    protected $fillable = [
        'fecha',
        'remision_proveedor',
        'materia_prima',
        'entrada',
        'peso_entrada',
        'salida',
        'peso_salida',
        'peso_neto',
        'origen_id',
        'destino_id',
        'alm_bascula_id',
        'transportista_id',
        'placa_id',
        'conductor_id',
        'proveedor_id',
        'peso_neto_proveedor',
    ];

    
}
