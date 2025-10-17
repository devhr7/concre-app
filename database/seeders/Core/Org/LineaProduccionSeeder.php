<?php

namespace Database\Seeders\Core\Org;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LineaProduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('linea_produccions')->insert([
            'codigo' => 'RMI',
            'nombre' => 'Linea 1',
            'sucursal_id' => 1, 
        ]);
        DB::table('linea_produccions')->insert([
            'codigo' => 'RZO',
            'nombre' => 'Linea 2',
            'sucursal_id' => 1,
        ]);
        DB::table('linea_produccions')->insert([
            'codigo' => 'RMT',
            'nombre' => 'Linea 3 - Torreon',
            'sucursal_id' => 2, 
        ]);
        DB::table('linea_produccions')->insert([
            'codigo' => 'HND',
            'nombre' => 'Linea 4 - Honda',
            'sucursal_id' => 3, 
        ]);
    }
}
