<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('licencia')->unique();
            $table->integer('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('id_bus');
            $table->timestamps();

            $table->foreign('id_rol')->on('roles')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bus_personal');
    }
}
