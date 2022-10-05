<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipo_bus');
            $table->string('marca');
            $table->string('placa')->unique();
            $table->string('estado');
            $table->integer('capacidad');
            $table->timestamps();

            $table->foreign('id_tipo_bus')->on('tipo_bus')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus');
    }
}
