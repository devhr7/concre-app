<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    //
    protected $table = 'tipo_personas';
    protected $fillable = [
        'codigo',
        'nombre',
        
    ];  
}
