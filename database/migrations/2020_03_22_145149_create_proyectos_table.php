<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proyecto');
            $table->text('descripcion_proyecto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin_estimada');
            $table->foreignId('estado_id',20);
            //$table->foreignId('tarea_id',20)->nullable($value = true);
            //$table->integer('lineabase_id')->unsigned()->nullable();
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
      
        Schema::dropIfExists('proyectos');
    }
}
