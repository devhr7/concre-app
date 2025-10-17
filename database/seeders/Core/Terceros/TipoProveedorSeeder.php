<?php

namespace Database\Seeders\Core\Terceros;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tiposProveedores = [
            ['nombre' => 'Materia Prima'],
            ['nombre' => 'Servicios'],
            ['nombre' => 'Equipos y Herramientas'],
            ['nombre' => 'Transporte'],
            ['nombre' => 'Conductor Externo'],
            ['nombre' => 'Seguros'],
            ['nombre' => 'Bancos'],
            ['nombre' => 'EPS'],
            ['nombre' => 'Fondo de Pensiones'],
            ['nombre' => 'Caja de Compensación'],
            ['nombre' => 'ARL'],
            
            

            ['nombre' => 'Otros'],
        ];

        DB::table('tipo_proveedors')->insert($tiposProveedores);
    }
}
