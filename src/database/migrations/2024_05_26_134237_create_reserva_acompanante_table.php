<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaAcompananteTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reserva_acompanante', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Reserva');
            $table->unsignedBigInteger('ID_Acompanante');
            
            $table->foreign('ID_Reserva')->references('ID_Reservas')->on('reservas')->onDelete('cascade');
            $table->foreign('ID_Acompanante')->references('ID_Acompanante')->on('acompanantes')->onDelete('cascade');

            // Defino la combinacion de ambbas claves foraneas como la clave primaria de esta tabla intermedia 
            $table->primary(['ID_Reserva', 'ID_Acompanante']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reserva_acompanante');
    }
}

