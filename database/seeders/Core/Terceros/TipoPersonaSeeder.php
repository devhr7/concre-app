<?php

namespace Database\Seeders\Core\Terceros;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //insertar tipos de persona
        DB::table('tipo_personas')->insert([
            ['codigo' => 'PN', 'nombre' => 'Natural'],
            ['codigo' => 'PJ', 'nombre' => 'Jurídica'],
        ]);
    }
}
