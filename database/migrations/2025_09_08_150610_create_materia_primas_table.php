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
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('nombre', 100);
            $table->unsignedBigInteger('unidad_medida_id')->nullable();
            $table->unsignedBigInteger('grupo_materia_prima_id')->nullable();
            $table->foreign('grupo_materia_prima_id')->references('id')->on('grupo_materia_primas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_primas');
    }
};
