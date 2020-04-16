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
            $table->bigIncrements('id');
            $table->string('nombre_proyecto');
            $table->text('descripcion_proyecto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin_estimada');
            $table->foreignId('estado_id',20);
            $table->foreignId('tarea_id',20)->nullable($value = true);

            $table->bigInteger('lineabase_id')-unsigned();
            $table->timestamps();

            $table->foreign('lineabase_id')->references('id')->on('linea_bases')->onDelete('cascade')->onUpdate('cascade');
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
