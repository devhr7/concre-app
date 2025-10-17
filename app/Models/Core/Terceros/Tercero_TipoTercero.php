<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tercero_TipoTercero extends Model
{
    //
    protected $table = 'tercero__tipo_terceros';
    protected $fillable = ['tercero_id', 'tipo_tercero_id'];

    public function tercero():BelongsTo
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    public function tipo_tercero():BelongsTo
    {
        return $this->belongsTo(TipoTercero::class, 'tipo_tercero_id');
    }
}
