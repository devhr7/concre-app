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
        Schema::create('tercero__tipo_terceros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tercero_id');
            $table->unsignedBigInteger('tipo_tercero_id');
            $table->foreign('tercero_id')->references('id')->on('terceros')->onDelete('cascade');
            $table->foreign('tipo_tercero_id')->references('id')->on('tipo_terceros')->onDelete('cascade');


            $table->index('tercero_id');
            $table->index('tipo_tercero_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tercero__tipo_terceros');
    }
};
