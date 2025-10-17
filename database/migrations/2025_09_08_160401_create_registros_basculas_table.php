<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros_basculas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('remision_proveedor')->nullable();

            $table->unsignedBigInteger('materia_prima')->nullable();
            $table->datetime('entrada')->nullable();
            $table->double('peso_entrada')->nullable();
            $table->datetime('salida')->nullable();
            $table->double('peso_salida')->nullable();
            $table->double('peso_neto')->nullable();

            $table->unsignedBigInteger('origen_id')->nullable();
            $table->foreign('origen_id')->references('id')->on('municipios')->onDelete('cascade');
            
            $table->unsignedBigInteger('destino_id')->nullable();
            $table->foreign('destino_id')->references('id')->on('linea_produccions')->onDelete('cascade');

            $table->unsignedBigInteger('alm_bascula_id')->nullable();
            $table->foreign('alm_bascula_id')->references('id')->on('alm_basculas')->onDelete('cascade');

            $table->unsignedBigInteger('transportista_id')->nullable();
            $table->foreign('transportista_id')->references('id')->on('terceros')->onDelete('cascade');

            $table->unsignedBigInteger('placa_id')->nullable();
            $table->foreign('placa_id')->references('id')->on('terceros')->onDelete('cascade');

            $table->string('placa');

            $table->unsignedBigInteger('conductor_id')->nullable();
            $table->foreign('conductor_id')->references('id')->on('terceros')->onDelete('cascade');

            $table->string('conductor')->nullable();


            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->foreign('proveedor_id')->references('id')->on('terceros')->onDelete('cascade');

            $table->double('peso_neto_proveedor')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_basculas');
    }
};
