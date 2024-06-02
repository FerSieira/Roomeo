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
        Schema::create('reserva_servicios', function (Blueprint $table) {
            $table->id('ID_RS');
            $table->foreignId('ID_Reserva')->constrained('reservas', 'ID_Reservas');
            $table->foreignId('ID_Servicio')->constrained('servicios', 'ID_Servicio');
            $table->foreignId('ID_Empleado')->constrained('empleados', 'ID_Empleado');
            $table->dateTime('Dia_Hora');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_servicios');
    }
};
