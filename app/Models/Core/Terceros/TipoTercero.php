<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoTercero extends Model
{
    //
    protected $table = 'tipo_terceros';
    protected $fillable = ['nombre'];

    public function Terceros_TipoTercero():HasMany
    {
        return $this->hasMany(Tercero_TipoTercero::class, 'tipo_tercero_id');
    }
}
