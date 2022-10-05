<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaPasajeBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_pasaje_bus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bus');
            $table->unsignedBigInteger('id_venta_pasaje');
            $table->integer('asiento');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_pasaje_bus');
    }
}
