<?php

namespace Database\Seeders\Core\Terceros;

use App\Models\Core\Terceros\Tercero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TerceroTipoTerceroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //Tercero_TipoTercero
        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' => 1,
            'tipo_tercero_id' => 1,
        ]);
        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' => 1,
            'tipo_tercero_id' => 2,
        ]);
        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' => 1,
            'tipo_tercero_id' => 3,
        ]);

        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' => Tercero::where('identificacion', 900180449)->first()->id,
            'tipo_tercero_id' => 1,
        ]);
        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' => Tercero::where('identificacion', 900180449)->first()->id,
            'tipo_tercero_id' => 2,
        ]);
        DB::table('tercero__tipo_terceros')->insert([
            'tercero_id' =>  Tercero::where('identificacion', 900180449)->first()->id,
            'tipo_tercero_id' => 3,
        ]);

        $TercerosProveedores = [
            [
                'tercero_id' => Tercero::where('identificacion', 900386703)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 901089852)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900318997)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900722576)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900263715)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 901309061)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 890100251)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 860350697)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900186724)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 901098041)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900405045)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 860024586)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900237153)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 5824752)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 901403919)->first()->id,
                'tipo_tercero_id' => 2,
            ],
             [
                'tercero_id' => Tercero::where('identificacion', 900907364)->first()->id,
                'tipo_tercero_id' => 2,
            ],
             [
                'tercero_id' => Tercero::where('identificacion', 860009808)->first()->id,
                'tipo_tercero_id' => 2,
            ],
             [
                'tercero_id' => Tercero::where('identificacion', 901061425)->first()->id,
                'tipo_tercero_id' => 2,
            ],
             [
                'tercero_id' => Tercero::where('identificacion', 901214682)->first()->id,
                'tipo_tercero_id' => 2,
            ],

            // Transporte
            [
                'tercero_id' => Tercero::where('identificacion', 901370508)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900646465)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 900870638)->first()->id,
                'tipo_tercero_id' => 2,
            ],
            [
                'tercero_id' => Tercero::where('identificacion', 901880388)->first()->id,
                'tipo_tercero_id' => 2,
            ],
         
        ];

        DB::table('tercero__tipo_terceros')->insert($TercerosProveedores);
    }
}
