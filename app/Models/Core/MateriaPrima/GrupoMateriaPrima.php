<?php

namespace App\Models\Core\MateriaPrima;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoMateriaPrima extends Model
{
    //
    protected $table = 'grupo_materia_primas';
    protected $fillable = [
        'nombre'];

    public function materias_primas():HasMany
    {
        return $this->hasMany(MateriaPrima::class, 'grupo_materia_prima_id');
    }
    
}
