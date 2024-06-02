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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('ID_Factura');
            $table->foreignId('ID_Reserva')->constrained('reservas', 'ID_Reservas');
            $table->decimal('Cant_Pago', 8, 2);
            $table->string('Metodo_Pago');
            $table->date('Fecha_Pago');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
