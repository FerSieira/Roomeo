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
        Schema::create('acompanantes', function (Blueprint $table) {
            $table->id('ID_Acompanante');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Codigo_Postal');
            $table->string('DNI');
            $table->date('fecha_nac');
            $table->string('nacionalidad');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('pais');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acompanantes');
    }
};
