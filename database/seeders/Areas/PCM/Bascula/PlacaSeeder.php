<?php

namespace Database\Seeders\Areas\PCM\Bascula;

use App\Models\Core\Terceros\Tercero;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // FullTrans
DB::table('vehiculos_bascula')->insert(['placa' => 'SNT284','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR059','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR060','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR061','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR063','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR064','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR065','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUR623','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'GUU624','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'UFZ440','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'UFZ441','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'SZX900','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'SZY037','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'SZZ223','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTN779','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTN782','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTQ192','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTQ193','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTR066','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTR068','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTR069','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'WCR641','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'WGO471','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTN785','tercero_id' => Tercero::where('identificacion', 900870638)->first()->id]);

// Invercoil
DB::table('vehiculos_bascula')->insert(['placa' => 'SON077','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TAL211','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'SPM567','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'SZY022','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);

DB::table('vehiculos_bascula')->insert(['placa' => 'SZY023','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);

DB::table('vehiculos_bascula')->insert(['placa' => 'TDZ955','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TGK764','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TGL148','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TGL303','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'VZH767','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'WZC274','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TGN357','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TAN008','tercero_id' => Tercero::where('identificacion', 900646465)->first()->id]);

// Inversiones CEP
DB::table('vehiculos_bascula')->insert(['placa' => 'TSN582','tercero_id' => Tercero::where('identificacion', 901370508)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'WLR815','tercero_id' => Tercero::where('identificacion', 901370508)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'WXK106','tercero_id' => Tercero::where('identificacion', 901370508)->first()->id]);

// ZZ Cargando
DB::table('vehiculos_bascula')->insert(['placa' => 'WCR650','tercero_id' => Tercero::where('identificacion', 901880388)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'UFZ424','tercero_id' => Tercero::where('identificacion', 901880388)->first()->id]);
DB::table('vehiculos_bascula')->insert(['placa' => 'TTN780','tercero_id' => Tercero::where('identificacion', 901880388)->first()->id]);



    }
}
