<?php

namespace App\Models\Areas\PCM\Bascula;

use App\Models\Core\MateriaPrima\MateriaPrima;
use App\Models\Core\Org\LineaProduccion;
use Illuminate\Database\Eloquent\Model;

class AlmBascula extends Model
{
    //

    protected $table = 'alm_basculas';
    protected $fillable = [
        'nombre',
        'LineaProduccion_id',
        'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo(MateriaPrima::class, 'producto_id');
    }
    
    public function linea_produccion()
    {
        return $this->belongsTo(LineaProduccion::class, 'LineaProduccion_id');
    }

    public static function options($alm_bascula_id = null, $linea_produccion_id = null, $producto_id = null, $alm_basculas = null)
    {
        $query = self::query();

        if ($alm_bascula_id) {
            $query->where('id', $alm_bascula_id);
        }

        if ($linea_produccion_id) {
            $query->where('LineaProduccion_id', $linea_produccion_id);
        }

        if ($producto_id) {
            $query->where('producto_id', $producto_id);
        }

        if ($alm_basculas && is_array($alm_basculas)) {
            $query->whereIn('nombre', $alm_basculas);
        }

        // Eager load for Vue usage
        $query->with('linea_produccion');
        $query->with('producto');

        return $query->orderBy('nombre')->get()->map(function ($alm_bascula) {
            return [
                'name' => $alm_bascula->nombre . ' - ' . ($alm_bascula->linea_produccion ? $alm_bascula->linea_produccion->nombre : 'N/A') . ' - ' . ($alm_bascula->producto ? $alm_bascula->producto->nombre : 'N/A'),
                'value' => $alm_bascula->id,
            ];
        })->toArray();
    }



}
