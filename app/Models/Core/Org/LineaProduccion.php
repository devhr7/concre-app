<?php

namespace App\Models\Core\Org;

use App\Models\Areas\PCM\Bascula\AlmBascula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LineaProduccion extends Model
{
    //
    protected $table = 'linea_produccions';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo', 'nombre', 'sucursal_id'];

    public function sucursal():BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    public function AlmBasculas():HasMany   
    {
        return $this->hasMany(AlmBascula::class, 'LineaProduccion_id');
    }


    public static function options($lineaProduccion_id = null, $sucursal_id = null, $lineasProduccion = null)
    {
        $query = self::query();

        if ($lineaProduccion_id) {
            $query->where('id', $lineaProduccion_id);
        }

        if ($sucursal_id) {
            $query->where('sucursal_id', $sucursal_id);
        }

        if ($lineasProduccion && is_array($lineasProduccion)) {
            $query->whereIn('nombre', $lineasProduccion);
        }

        // Eager load sucursal for Vue usage
        $query->with('sucursal');

        return $query->orderBy('nombre')->get()->map(function ($linea) {
            return [
                'name' => $linea->nombre . ' - ' . $linea->sucursal->nombre ,
                'value' => $linea->id,
            ];
        })->toArray();
    }
}
