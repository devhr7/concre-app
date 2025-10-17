<?php

namespace App\Models\Core\Geo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
    //
    protected $table = 'departamentos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'pais_id'];

    // Scope
    public function scopeSearch(Builder $q, ?string $s): Builder
    {
        if ($s) {
            $q->where('nombre', 'like', "%$s%");
        }
        return $q;
    }

    // Relaciones
    public function pais():BelongsTo
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class, 'departamento_id', 'id');
    }
}
