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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('ID_Empleado');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->enum('Departamento', ['Recepcion', 'Pisos']);
            $table->string('Usuario')->unique();
            $table->string('Contrasena');
            $table->string('Telefono');
            $table->string('Email')->unique();
            $table->enum('Rol', ['usuario', 'administrador']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
