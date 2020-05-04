<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned()->nullable();
            $table->string('version_tarea');
            $table->string('prioridad_tarea');
            $table->string('estado_tarea');
            $table->string('descripcion_tarea');
            $table->string('observacion_tarea');
            $table->integer('tarea_id')->unsigned()->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('base_id')->unsigned()->nullable();
            $table->timestamps();

                $table->foreign('proyecto_id')->references('id')->on('proyectos');
                $table->foreign('tarea_id')->references('id')->on('tareas');
                $table->foreign('base_id')->references('id')->on('linea_bases');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       Schema::dropIfExists('tareas');
       Schema::dropIfExists('linea_bases');
    }
}
