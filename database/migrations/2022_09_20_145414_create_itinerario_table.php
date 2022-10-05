<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bus');
            $table->string('nombre_itinerario');
            $table->string('origen');
            $table->string('destino');
            $table->string('dia');
            $table->integer('precio');
            $table->string('hora_salida');
            $table->string('hora_llegada');
            $table->timestamps();

            $table->foreign('id_bus')->on('bus')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itinerario');
    }
}
