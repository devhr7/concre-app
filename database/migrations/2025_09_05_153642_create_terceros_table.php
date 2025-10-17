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
        Schema::create('terceros', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(1);
            $table->integer('identificacion')->unique();
            $table->string('nombre1', 200)->nullable();
            $table->string('nombre2', 200)->nullable();
            $table->string('apellido1', 200)->nullable();
            $table->string('apellido2', 200)->nullable();
            $table->string('razon_social', 200)->nullable();

            $table->string('direccion', 200)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('email', 100)->nullable();
            // Tipo de documento
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_persona_id')->nullable();
            $table->foreign('tipo_persona_id')->references('id')->on('tipo_personas')->onDelete('set null');

            
            // Pais
            $table->unsignedBigInteger('pais_id')->nullable();
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('set null');
            // Departamento
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('set null');
            // Municipio
            $table->unsignedBigInteger('municipios_id')->nullable();
            $table->foreign('municipios_id')->references('id')->on('municipios')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terceros');
    }
};
