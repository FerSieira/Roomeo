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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('ID_Reservas');
            $table->date('Fecha_Llegada');
            $table->date('Fecha_Salida');
            $table->integer('Adultos');
            $table->integer('Ninos')->nullable();
            $table->text('Solicitudes')->nullable();
            $table->enum('Estado', ['pendiente', 'confirmada', 'cancelada', 'completada','en curso']);
            $table->time('hora_entra')->nullable();
            $table->time('hora_sale')->nullable();
            $table->foreignId('ID_Cliente')->constrained('clientes', 'ID_Cliente');
            $table->foreignId('ID_Habitacion')->constrained('habitaciones', 'ID_Habitacion');
            $table->foreignId('ID_Tipo_Hab')->constrained('tipo_habitaciones', 'ID_Tipo_Hab');
            $table->foreignId('ID_Tarifa')->constrained('tarifas', 'ID_Tarifa');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
