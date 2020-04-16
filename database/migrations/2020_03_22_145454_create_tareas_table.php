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
            $table->string('version_tarea');
            $table->string('prioridad_tarea');
            //$table->enum('estado_tarea', ['Iniciado', 'Pendiente','Finalizado']);
            $table->string('estado_tarea');
            $table->string('descripcion_tarea');
            $table->string('observacion_tarea');
            $table->foreignId('tarea_id',20)->nullable($value = true);
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
        Schema::dropIfExists('tareas');
    }
}
