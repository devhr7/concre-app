<?php

namespace Database\Seeders\Core\Org;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //insertar sede ibague y honda

        DB::table('sedes')->insert([
            'nombre' => 'Ibague',
        ]);

        DB::table('sedes')->insert([
            'nombre' => 'Honda',
        ]);
    }
}
