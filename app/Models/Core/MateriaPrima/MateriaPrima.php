<?php

namespace App\Models\Core\MateriaPrima;

use App\Models\Areas\PCM\Bascula\AlmBascula;
use App\Models\Core\UnidadMedida\UnidadMedida;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MateriaPrima extends Model
{
    //
    protected $table = 'materia_primas';
    protected $fillable = [
        'is_active',
        'nombre',
        'unidad_medida_id',
        'grupo_materia_prima_id'
    ];

    public function unidad_medida():BelongsTo
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id');
    }

    public function grupo_materia_prima():BelongsTo
    {
        return $this->belongsTo(GrupoMateriaPrima::class, 'grupo_materia_prima_id');
    }

    public function AlmBasculas():HasMany
    {
        return $this->hasMany(AlmBascula::class, 'producto_id');
    }


    public static function options($materia_prima_id = null, $grupo_materia_prima = null, $materia_prima = null){
        $query = MateriaPrima::where('is_active', 1);

        if($materia_prima_id){
            $query->where('id', $materia_prima_id);
        }

        if($grupo_materia_prima){
            $query->where('grupo_materia_prima_id', $grupo_materia_prima);
        }

        if($materia_prima){
            $query->where('nombre', 'like', '%'.$materia_prima.'%');
        }

        $data = $query->get();

        $options = [];
        foreach ($data as $item) {
            $options[] = [
                'id' => $item->id,
                'name' => $item->nombre,
                'unidad_medida' => $item->unidad_medida->abreviatura
            ];
        }
        return $options;
    }
}
