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
        Schema::create('tipo_habitaciones', function (Blueprint $table) {
            $table->id('ID_Tipo_Hab');
            $table->string('Nombre_Tipo');
            $table->text('Descripcion')->nullable();
            $table->integer('Capacidad');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_habitaciones');
    }
};
