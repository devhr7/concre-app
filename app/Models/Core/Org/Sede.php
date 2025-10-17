<?php

namespace App\Models\Core\Org;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sede extends Model
{
    //
    protected $table = 'sedes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    public function sucursales():HasMany
    {
        return $this->hasMany(Sucursal::class, 'sede_id');
    }
}
