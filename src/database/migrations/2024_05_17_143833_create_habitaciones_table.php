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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id('ID_Habitacion');
            $table->string('Num_hab');
            $table->integer('Planta');
            $table->enum('Estado', ['Limpia', 'Sucia', 'Ocupada', 'Libre', 'Bloqueada']);
            $table->foreignId('ID_Tipo_Hab')->constrained('tipo_habitaciones', 'ID_Tipo_Hab');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
