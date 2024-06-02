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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_Cliente');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('DNI');
            $table->string('Nacionalidad');
            $table->string('Telefono');
            $table->date('Fecha_nacimiento');
            $table->string('Email');
            $table->string('Direccion');
            $table->string('Codigo_Postal');
            $table->string('Ciudad');
            $table->string('Pais');
            $table->string('Tarjeta_Cred')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
