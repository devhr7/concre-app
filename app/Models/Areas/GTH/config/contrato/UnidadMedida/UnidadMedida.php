<?php

namespace App\Models\Core\UnidadMedida;

use App\Models\Core\MateriaPrima\MateriaPrima;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadMedida extends Model
{
    //
    protected $table = 'unidad_medidas';
    protected $fillable = [
        'nombre',
        'codigo',
    ];

    public function materias_primas():HasMany
    {
        return $this->hasMany(MateriaPrima::class, 'unidad_medida_id');
    }

}
