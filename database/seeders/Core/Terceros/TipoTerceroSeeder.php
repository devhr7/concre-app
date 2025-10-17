<?php

namespace Database\Seeders\Core\Terceros;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 

class TipoTerceroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tipo de tercero
        DB::table('tipo_terceros')->insert([
            ['nombre' => 'Cliente'],
            ['nombre' => 'Proveedor'],
            ['nombre' => 'Empleado'],
        
        ]);
        
    }
}
