<?php

namespace Database\Seeders\Areas\GTH;

use App\Models\Core\Terceros\Tercero;
use App\Models\Core\Terceros\Tercero_TipoTercero;
use App\Models\Core\Terceros\TerceroHasTipoproveedor;
use App\Models\Core\Terceros\TipoDocumento;
use App\Models\Core\Terceros\TipoPersona;
use App\Models\Core\Terceros\TipoProveedor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GTHTerceroSeeder extends Seeder
{
    public function run(): void
    {
        // Bancos
        $bancos = [
            [
                'is_active' => 1,
                'identificacion' => 860034594,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Scotiabank Colpatria S.A.',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 890900467,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'BBVA Colombia S.A.',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            
            [
                'is_active' => 1,
                'identificacion' => 890900436,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Banco Davivienda S.A.',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 890913700,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Bancolombia S.A.',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 860002964,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Banco de Bogotá',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ]

        ];
        // Crear los bancos en la tabla de terceros
        foreach ($bancos as $banco) {
            $tercero = Tercero::create($banco);
            // tercero__tipo_terceros (2 = Proveedor)
            Tercero_TipoTercero::insert([
                'tercero_id' => $tercero->id,
                'tipo_tercero_id' => 2, // Proveedor
            ]);
            TerceroHasTipoproveedor::insert([
                'tercero_id' => $tercero->id,
                'tipoproveedor_id' => TipoProveedor::where('nombre', 'Bancos')->first()->id,
            ]);
        }

        $eps = [
            [
                'is_active' => 1,
                'identificacion' => 800199268,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Sanitas S.A.',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 800517042,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Compensar EPS',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 800515693,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Cafesalud EPS',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 900249060,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Nueva EPS',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            [
                'is_active' => 1,
                'identificacion' => 900405688,
                'nombre1' => null,
                'nombre2' => null,
                'apellido1' => null,
                'apellido2' => null,
                'razon_social' => 'Aliansalud EPS',
                'direccion' => null,
                'telefono' => null,
                'email' => null,
                'tipo_documento_id' => TipoDocumento::where('codigo', 'NIT')->first()->id,
                'tipo_persona_id' => TipoPersona::where('codigo', 'PJ')->first()->id,
                'pais_id' => null,
                'departamento_id' => null,
                'municipios_id' => null,
            ],
            
        ];

    }

}