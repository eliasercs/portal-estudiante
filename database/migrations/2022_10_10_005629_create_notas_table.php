<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * La tabla notas tiene almacenada toda la informacion referente a las notas de los usuarios
     * en donde cada uno estara identificado por un id,
     * y estara asociado a un determinado curso inscrito
     * como parametros llevara la nota obtenida y el porcentaje de peso que tiene sobre el ramo
     * tambien se almacenara la fecha de subida la evaluacion, en donde se establece automaticamente
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inscripcion');
            $table->unsignedFloat('nota');
            $table->unsignedFloat('porcentaje');
            $table->dateTime('Fecha')->default(now());

            $table->foreign('inscripcion')->references('id')->on('Curso_inscrito')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
