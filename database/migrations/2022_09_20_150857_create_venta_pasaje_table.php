<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaPasajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_pasaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasajero');
            $table->unsignedBigInteger('id_itinerario');
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('id_pasajero')->on('pasajero')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_itinerario')->on('itinerario')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_pasaje');
    }
}
