<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;

class TipoProveedor extends Model
{
    //
    protected $table = 'tipo_proveedors';
    protected $fillable = [
        'nombre',
    ];

    public function Terceros_TipoProveedor()
    {
        return $this->hasMany(TerceroHasTipoproveedor::class, 'tipoproveedor_id');
    }

    
    
}
