<?php

namespace App\Models\Core\Geo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipio extends Model
{
    //
    protected $table = 'municipios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'departamento_id'];

    public function departamento():BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function pais():BelongsTo
    {
        return $this->departamento()->with('pais');
    }

    // options municipios
    // Filtro municipio_id un municipio especifico
    // Filtro departamento_id todos los municipios de un departamento
    // Filtro municipios un array de municipios especificos deacuerdo el nombre
    public static function options($municipio_id = null, $departamento_id = null, $municipios = null)
    {
        $query = self::query();

        if ($municipio_id) {
            $query->where('id', $municipio_id);
        }

        if ($departamento_id) {
            $query->where('departamento_id', $departamento_id);
        }

        if ($municipios && is_array($municipios)) {
            $query->whereIn('nombre', $municipios);
        }

        // Eager load departamento for Vue usage
        $query->with('departamento');

        return $query->orderBy('nombre')->get()->map(function ($municipio) {
            return [
                'name' => $municipio->nombre . ' - ' . ($municipio->departamento ? $municipio->departamento->nombre : 'N/A'),
                'value' => $municipio->id,
            ];
        })->toArray();
    }
}


/** 

const countries = ref([
    { name: 'Australia', code: 'AU' },
    { name: 'Brazil', code: 'BR' },
    { name: 'China', code: 'CN' },
    { name: 'Egypt', code: 'EG' },
    { name: 'France', code: 'FR' },
    { name: 'Germany', code: 'DE' },
    { name: 'India', code: 'IN' },
    { name: 'Japan', code: 'JP' },
    { name: 'Spain', code: 'ES' },
    { name: 'United States', code: 'US' }
]);

*/