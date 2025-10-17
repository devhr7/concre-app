<?php

namespace Database\Seeders\Areas\ASC\MateriaPrima;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GrupoMateriaPrimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('grupo_materia_primas')->insert([
            'nombre' => 'Cementantes',
        ]);
          DB::table('grupo_materia_primas')->insert([
            'nombre' => 'Aditivos',
        ]);
          DB::table('grupo_materia_primas')->insert([
            'nombre' => 'Agregados',
        ]);
          DB::table('grupo_materia_primas')->insert([
            'nombre' => 'Agua',
        ]);
           DB::table('grupo_materia_primas')->insert([
            'nombre' => 'Otros',
        ]);
    }
}
