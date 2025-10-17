<?php

namespace Database\Seeders\Core\Geo;

use App\Models\Core\Geo\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar pais Colombia
        Pais::create(['nombre' => 'Colombia']);
        
        
    }
}
