<?php

namespace Database\Seeders\Core\Geo;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //departamentos de colombia  pais_id = 1

        $departamentos = [
            ['nombre' => 'Amazonas', 'pais_id' => 1],
            ['nombre' => 'Antioquia', 'pais_id' => 1],
            ['nombre' => 'Arauca', 'pais_id' => 1],
            ['nombre' => 'Atlántico', 'pais_id' => 1],
            ['nombre' => 'Bolívar', 'pais_id' => 1],
            ['nombre' => 'Boyacá', 'pais_id' => 1],
            ['nombre' => 'Caldas', 'pais_id' => 1],
            ['nombre' => 'Caquetá', 'pais_id' => 1],
            ['nombre' => 'Casanare', 'pais_id' => 1],
            ['nombre' => 'Cauca', 'pais_id' => 1],
            ['nombre' => 'Cesar', 'pais_id' => 1],
            ['nombre' => 'Chocó', 'pais_id' => 1],
            ['nombre' => 'Córdoba', 'pais_id' => 1],
            ['nombre' => 'Cundinamarca', 'pais_id' => 1],
            ['nombre' => 'Guainía', 'pais_id' => 1],
            ['nombre' => 'Guaviare', 'pais_id' => 1],
            ['nombre' => 'Huila', 'pais_id' => 1],
            ['nombre' => 'La Guajira', 'pais_id' => 1],
            ['nombre' => 'Magdalena', 'pais_id' => 1],
            ['nombre' => 'Meta', 'pais_id' => 1],
            ['nombre' => 'Nariño', 'pais_id' => 1],
            ['nombre' => 'Norte de Santander', 'pais_id' => 1],
            ['nombre' => 'Putumayo', 'pais_id' => 1],
            ['nombre' => 'Quindío', 'pais_id' => 1],
            ['nombre' => 'Risaralda', 'pais_id' => 1],
            ['nombre' => 'San Andrés y Providencia', 'pais_id' => 1],
            ['nombre' => 'Santander', 'pais_id' => 1],
            ['nombre' => 'Sucre', 'pais_id' => 1],
            ['nombre' => 'Tolima', 'pais_id' => 1],
            ['nombre' => 'Valle del Cauca', 'pais_id' => 1],
            ['nombre' => 'Vaupés', 'pais_id' => 1],
            ['nombre' => 'Vichada', 'pais_id' => 1],
        ];    
        // insertamos los departamentos en la base de datos
        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert([
                'nombre' => $departamento['nombre'],
                'pais_id' => $departamento['pais_id'],
            ]); 
        }

       

        
    }
}
