<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalOficinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_oficina', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('estado');
            $table->date('fecha_ingreso');
            $table->unsignedBigInteger('id_oficina');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('id_oficina')->on('oficina')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_oficina');
    }
}
