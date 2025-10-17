<?php

namespace Database\Seeders\Areas\PCM\Bascula;

use App\Models\Core\MateriaPrima\MateriaPrima;
use App\Models\Core\Org\LineaProduccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmBasculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alm_basculas')->insert([
            [
                'nombre' => 'Silo 90',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RMI')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ],
            [
                'nombre' => 'Silo 100',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RMI')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ],
            [
                'nombre' => 'Silo 140',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RMI')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento UG')->first()->id,
            ],
            [
                'nombre' => 'Silo 111',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RZO')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ],
            [
                'nombre' => 'Silo 293',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RZO')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ],
            [
                'nombre' => 'Silo 315',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RMT')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ],
            [
                'nombre' => 'Silo 399',
                'LineaProduccion_id' => LineaProduccion::where('codigo', 'RMT')->first()->id,
                'producto_id' => MateriaPrima::where('nombre', 'Cemento')->first()->id,
            ]
        ]);
    }
    
}
