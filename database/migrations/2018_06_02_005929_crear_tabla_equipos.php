<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serie_equipo_anterior');
            $table->string('fecha_alta');
            $table->string('tipo');
            $table->string('marca');
            $table->string('unidad_destino');
            $table->string('subunidad_destino');
            $table->string('telefono');    
            $table->string('personal_dip');
            $table->string('observaciones');
            $table->string('estado_equipo');         
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
        Schema::dropIfExists('equipos');
    }
}
