<?php
namespace App\Models\Core\UnidadMedida;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadMedida extends Model
{
    //
    protected $table = 'unidad_medidas';
    protected $fillable = [
        'codigo','nombre'];


    
}
