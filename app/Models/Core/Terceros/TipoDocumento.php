<?php

namespace App\Models\Core\Terceros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDocumento extends Model
{
    //
    protected $table = 'tipo_documentos';
    protected $fillable = ['codigo', 'nombre'];

    public function terceros():HasMany
    {
        return $this->hasMany(Tercero::class, 'tipo_documento_id');
    }
}
