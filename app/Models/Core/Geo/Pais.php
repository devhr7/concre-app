<?php

namespace App\Models\Core\Geo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    //
    protected $table = 'pais';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    public function departamentos():HasMany
    {
        return $this->hasMany(Departamento::class, 'pais_id', 'id');
    }
}
