<?php

namespace App\Models\Areas\PCM\Bascula;

use App\Models\Core\Terceros\Tercero;
use Illuminate\Database\Eloquent\Model;

class VehiculoBascula extends Model
{
    //
    protected $table = 'vehiculos_bascula';
    protected $fillable = ['placa', 'tercero_id'];

    public function Tercero()
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    public static function vehiculosOptions($id = null, $tercero_id = null, $placas = null)
    {
        $query = VehiculoBascula::query();

        if ($id) {
            $query->where('id', $id);
        }

        if ($tercero_id) {
            $query->where('tercero_id', $tercero_id);
        }

        if ($placas && is_array($placas)) {
            $query->whereIn('placa', $placas);
        }

        return $query->get()->map(function ($vehiculo) {
            return [
                'value' => $vehiculo->id,
                'name' => $vehiculo->placa,
            ];
        })->toArray();
    }


}
