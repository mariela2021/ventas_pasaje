<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEncomiendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_encomienda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bus');
            $table->unsignedBigInteger('id_encomienda');
            $table->unsignedBigInteger('id_oficina');
            $table->timestamps();

            $table->foreign('id_bus')->on('bus')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_encomienda')->on('encomienda')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_oficina')->on('oficina')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_encomienda');
    }
}
