<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TerceroHasTipoproveedor extends Model
{
    //
    protected $table = 'tercero_has_tipoproveedors';
    protected $fillable = [
        'tercero_id',
        'tipoproveedor_id',
    ];

    public function tercero():BelongsTo
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    public function tipoproveedor():BelongsTo
    {
        return $this->belongsTo(TipoProveedor::class, 'tipoproveedor_id');
    }
}
