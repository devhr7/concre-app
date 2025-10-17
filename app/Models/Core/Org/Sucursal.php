<?php

namespace App\Models\Core\Org;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sucursal extends Model
{
    //
    protected $table = 'sucursals';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'sede_id'];

    public function sede():BelongsTo
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function lineaProduccions()
    {
        return $this->hasMany(LineaProduccion::class, 'sucursal_id');
    }
}
