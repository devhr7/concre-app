<?php

namespace Database\Seeders\Core\Geo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //municipios del tolima = departamento_id 29

        $municipios_tolima = [
            ['nombre' => 'Alpujarra', 'departamento_id' => 29],
            ['nombre' => 'Alvarado', 'departamento_id' => 29],
            ['nombre' => 'Ambalema', 'departamento_id' => 29],
            ['nombre' => 'Anzoátegui', 'departamento_id' => 29],
            ['nombre' => 'Armero', 'departamento_id' => 29],
            ['nombre' => 'Ataco', 'departamento_id' => 29],
            ['nombre' => 'Cajamarca', 'departamento_id' => 29],
            ['nombre' => 'Carmen de Apicalá', 'departamento_id' => 29],
            ['nombre' => 'Casabianca', 'departamento_id' => 29],
            ['nombre' => 'Chaparral', 'departamento_id' => 29],
            ['nombre' => 'Coello', 'departamento_id' => 29],
            ['nombre' => 'Coyaima', 'departamento_id' => 29],
            ['nombre' => 'Cunday', 'departamento_id' => 29],
            ['nombre' => 'Dolores', 'departamento_id' => 29],
            ['nombre' => 'El Espinal', 'departamento_id' => 29],
            ['nombre' => 'Falan', 'departamento_id' => 29],
            ['nombre' => 'Flandes', 'departamento_id' => 29],
            ['nombre' => 'Fresno', 'departamento_id' => 29],
            ['nombre' => 'Guamo', 'departamento_id' => 29],
            ['nombre' => 'Herveo', 'departamento_id' => 29],
            ['nombre' => 'Honda', 'departamento_id' => 29],
            ['nombre' => 'Ibagué', 'departamento_id' => 29],
            ['nombre' => 'Icononzo', 'departamento_id' => 29],
            ['nombre' => 'Lérida', 'departamento_id' => 29],
            ['nombre' => 'Líbano', 'departamento_id' => 29],
            ['nombre' => 'Mariquita', 'departamento_id' => 29],
            ['nombre' => 'Melgar', 'departamento_id' => 29],
            ['nombre' => 'Murillo', 'departamento_id' => 29],
            ['nombre' => 'Natagaima', 'departamento_id' => 29],
            ['nombre' => 'Ortega', 'departamento_id' => 29],
            ['nombre' => 'Palocabildo', 'departamento_id' => 29],
            ['nombre' => 'Piedras', 'departamento_id' => 29],
            ['nombre' => 'Planadas', 'departamento_id' => 29],
            ['nombre' => 'Prado', 'departamento_id' => 29],
            ['nombre' => 'Purificación', 'departamento_id' => 29],
            ['nombre' => 'Rioblanco', 'departamento_id' => 29],
            ['nombre' => 'Roncesvalles', 'departamento_id' => 29],
            ['nombre' => 'Rovira', 'departamento_id' => 29],
            ['nombre' => 'Saldaña', 'departamento_id' => 29],
            ['nombre' => 'San Antonio', 'departamento_id' => 29],
            ['nombre' => 'San Luis', 'departamento_id' => 29],      
            ['nombre' => 'Santa Isabel', 'departamento_id' => 29],
            ['nombre' => 'Suárez', 'departamento_id' => 29],
            ['nombre' => 'Valle de San Juan', 'departamento_id' => 29],
            ['nombre' => 'Venadillo', 'departamento_id' => 29],
            ['nombre' => 'Villahermosa', 'departamento_id' => 29],
            ['nombre' => 'Villarrica', 'departamento_id' => 29],
            ['nombre' => 'Payande', 'departamento_id' => 29],
            
        ];
         // insertamos los municipios en la base de datos
            foreach ($municipios_tolima as $municipio) {
                DB::table('municipios')->insert([
                    'nombre' => $municipio['nombre'],
                    'departamento_id' => $municipio['departamento_id'],
                ]); 
            }

        
  
  
    }
}
