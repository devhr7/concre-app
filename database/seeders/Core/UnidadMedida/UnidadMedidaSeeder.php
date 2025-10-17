<?php

namespace Database\Seeders\Core\UnidadMedida;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    DB::table('unidad_medidas')->insertOrIgnore([
        [
            'nombre' => 'Kilogramo',
            'codigo' => 'kg',
        ],
        [
            'nombre' => 'Litro',
            'codigo' => 'L',
        ],
        [
            'nombre' => 'Metro Cubico',
            'codigo' => 'm3',
        ],
        [
            'nombre' => 'Unidad',
            'codigo' => 'ud',
        ]
    ]);
        
    }
}
