<?php

namespace Database\Seeders\Areas\ASC\MateriaPrima;

use App\Models\Core\MateriaPrima\GrupoMateriaPrima;
use App\Models\Core\UnidadMedida\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaPrimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Corrección: El método insert espera un solo array de registros, no múltiples argumentos.
        $kg = UnidadMedida::where('nombre', 'Kilogramo')->first();
        $lt = UnidadMedida::where('nombre', 'Litro')->first();
        $cementantes = GrupoMateriaPrima::where('nombre','Cementantes')->first();
        $agregados = GrupoMateriaPrima::where('nombre','Agregados')->first();
        $agua = GrupoMateriaPrima::where('nombre','Agua')->first();

        if ($kg && $lt && $cementantes && $agregados && $agua) {
            DB::table('materia_primas')->insert([
                [
                    'nombre' => 'Cemento',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $cementantes->id,
                ],
                [
                    'nombre' => 'Cemento UG',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $cementantes->id,
                ],
                [
                    'nombre' => 'Ceniza',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $cementantes->id,
                ],
                [
                    'nombre' => 'Arena',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $agregados->id,
                ],
                [
                    'nombre' => 'Arena Fina',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $agregados->id,
                ],
                [
                    'nombre' => 'Grava 1',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $agregados->id,
                ],
                [
                    'nombre' => 'Grava 1/2',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $agregados->id,
                ],
                [
                    'nombre' => 'Grava 3/4',
                    'unidad_medida_id' => $kg->id,
                    'grupo_materia_prima_id' => $agregados->id,
                ],
                [
                    'nombre' => 'Agua',
                    'unidad_medida_id' => $lt->id,
                    'grupo_materia_prima_id' => $agua->id,
                ]
            ]);
        } else {
            // Opcional: puedes lanzar una excepción o mostrar un mensaje de error aquí
            throw new \Exception('No se encontraron los registros necesarios en unidad_medidas o grupo_materia_primas');
        }
    }

}

