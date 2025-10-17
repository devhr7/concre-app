<?php

namespace Database\Seeders\Core\Terceros;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //insertar tipos de documento
        DB::table('tipo_documentos')->insert([
            ['codigo' => 'CC', 'nombre' => 'Cédula de ciudadanía'],
            ['codigo' => 'CE', 'nombre' => 'Cédula de extranjería'],
            ['codigo' => 'NIT', 'nombre' => 'Número de identificación tributaria'],
            ['codigo' => 'PAS', 'nombre' => 'Pasaporte'],
            ['codigo' => 'TI', 'nombre' => 'Tarjeta de identidad'],
            ['codigo' => 'RC', 'nombre' => 'Registro civil'],
            ['codigo' => 'PEP', 'nombre' => 'Permiso especial de permanencia'],
        ]);
    }
}
