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
            $table->string('password');
            $table->string('Telefono');
            $table->string('Email')->unique();
            $table->enum('Rol', ['usuario', 'administrador']);
            $table->timestamps();
        });

        DB::table('empleados')->insert([
            'Nombre' => 'Admin',
            'Apellidos' => 'Usuario',
            'Departamento' => 'Recepcion',
            'Usuario' => 'Admin',
            'password' => Hash::make('Abcd123.'),
            'Telefono' => '999999999',
            'Email' => 'admin@roomeo.es',
            'Rol' => 'administrador',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
