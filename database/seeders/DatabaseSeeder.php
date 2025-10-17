<?php

namespace Database\Seeders;

use App\Models\Core\Terceros\Tercero;
use Database\Seeders\Areas\ASC\MateriaPrima\GrupoMateriaPrimaSeeder;
use Database\Seeders\Areas\ASC\MateriaPrima\MateriaPrimaSeeder;
use Database\Seeders\Areas\GTH\GTHTerceroSeeder;
use Database\Seeders\Areas\PCM\Bascula\AlmBasculaSeeder;
use Database\Seeders\Areas\PCM\Bascula\PlacaSeeder;
use Database\Seeders\Core\Terceros\TerceroSeeder;
use Database\Seeders\Core\Geo\DepartamentoSeeder;
use Database\Seeders\Core\Geo\MunicipioSeeder;
use Database\Seeders\Core\Geo\PaisSeeder;
use Database\Seeders\Core\Org\LineaProduccionSeeder;
use Database\Seeders\Core\Org\SedeSeeder;
use Database\Seeders\Core\Org\SucursalSeeder;
use Database\Seeders\Core\Terceros\TerceroHasTipoproveedorSeeder;
use Database\Seeders\Core\Terceros\TerceroTipoTerceroSeeder;
use Database\Seeders\Core\Terceros\TipoDocumentoSeeder;
use Database\Seeders\Core\Terceros\TipoPersonaSeeder;
use Database\Seeders\Core\Terceros\TipoProveedorSeeder;
use Database\Seeders\Core\Terceros\TipoTerceroSeeder;
use Database\Seeders\Core\UnidadMedida\UnidadMedidaSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            PaisSeeder::class,
            DepartamentoSeeder::class,
            MunicipioSeeder::class,

            SedeSeeder::class,
            SucursalSeeder::class,
            LineaProduccionSeeder::class,

            TipoDocumentoSeeder::class,
            TipoPersonaSeeder::class,
            TipoTerceroSeeder::class,
            TerceroSeeder::class,

            TerceroTipoTerceroSeeder::class,
            TipoProveedorSeeder::class,
            TerceroHasTipoproveedorSeeder::class,


            UnidadMedidaSeeder::class,
            GrupoMateriaPrimaSeeder::class,
            MateriaPrimaSeeder::class,
            AlmBasculaSeeder::class,

            PlacaSeeder::class,

            GTHTerceroSeeder::class,
            
        ]);
    }
}