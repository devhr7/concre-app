<?php

namespace Database\Seeders\Core\Terceros;

use App\Models\Core\Terceros\Tercero;
use App\Models\Core\Terceros\Tercero_TipoTercero;
use App\Models\Core\Terceros\TerceroHasTipoproveedor;
use App\Models\Core\Terceros\TipoProveedor;
use App\Models\Core\Terceros\TipoTercero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerceroHasTipoproveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tabla tercero_has_tipoproveedors

        $tercero_tipoproveedors = [
           
['tercero_id' =>  Tercero::where('identificacion',  900386703)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901089852)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900318997)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900722576)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900263715)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901309061)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  890100251)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  860350697)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900186724)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  830139442)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901098041)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900405045)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  860024586)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900237153)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  5824752)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901403919)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900907364)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901061425)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  860009808)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901214682)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Materia Prima')->first()->id],

// Transporte
['tercero_id' =>  Tercero::where('identificacion',  901370508)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Transporte')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900646465)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Transporte')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  900870638)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Transporte')->first()->id],
['tercero_id' =>  Tercero::where('identificacion',  901880388)->first()->id, 'tipoproveedor_id' => TipoProveedor::where('nombre', 'Transporte')->first()->id],


        ];

        // insertar tabla Tercero_TipoProveedor
        TerceroHasTipoproveedor::insert($tercero_tipoproveedors);

        
    }
}
