<?php

namespace Database\Seeders\Core\Org;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //insertar sucursal principal en ibague

        DB::table('sucursals')->insert([
            'nombre' => 'Mirolindo',
            'sede_id' => 1, // Asumiendo que la sede con ID 1 es Ibague
        ]);

        DB::table('sucursals')->insert([
            'nombre' => 'Torreon',
            'sede_id' => 1, // Asumiendo que la sede con ID 1 es Ibague
        ]);


        DB::table('sucursals')->insert([
            'nombre' => 'Honda',
            'sede_id' => 2, // Asumiendo que la sede con ID 2 es Honda
        ]);
    }
}
