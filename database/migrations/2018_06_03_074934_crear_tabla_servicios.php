<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipo' ,100)->nullable();
            $table->string('fecha_ingreso' ,12)->nullable();
            $table->string('unidad_destino' ,60)->nullable();
            $table->string('subunidad_destino' ,30)->nullable();
            $table->string('personal_entrega' ,60)->nullable();
            $table->string('telefono' ,20)->nullable();
            $table->string('personal_div_servicio' ,30)->nullable();
            $table->string('accesorios' ,300)->nullable();
            $table->string('motivo_ingreso' ,300)->nullable();
            $table->string('detalle_reparacion' ,700)->nullable();
            $table->string('fecha_devolucion' ,12)->nullable();
            $table->string('personal_retira' ,60)->nullable();
            $table->string('personal_div_entrega' ,60)->nullable();
            $table->string('observacion_retira' ,300)->nullable();
            $table->string('estado_servicio' ,20)->nullable();
            $table->string('marca_editar' ,10)->default('editar');
           
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
        Schema::dropIfExists('servicios');
    }
}

