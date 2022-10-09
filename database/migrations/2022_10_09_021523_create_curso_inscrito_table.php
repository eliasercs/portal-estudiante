<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoInscritoTable extends Migration
{
    /**
     * en esta tabla estaran marcados todos los cursos que halla inscrito un determinado usuario
     * cada curso estara identificado por un id autoincremental
     * como son los cursos que halla inscrito un determinado usuario, estara relacionado con una registro academico y una determinada
     * seccion en la que realizara dicho curso.
     * como parametros llevara la fecha de inscripcion, la cual se establece automaticamente
     * y por ultimo la cantidad de veces que dicho usuario asistio a clases, para medir la asistencia se registra la cantidad
     * de veces que el usuario asistio a clases dividido en la cantidad de clases que tiene el curso, cuyo parametro se encuentra en seccion
     */
    public function up()
    {
        Schema::create('curso_inscrito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('registro');
            $table->unsignedBigInteger('seccion');
            $table->dateTime('Fecha')->default(now());
            $table->unsignedInteger('Asistencia');

            $table->foreign('registro')->references('id')->on('academic_records')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('seccion')->references('id')->on('seccion')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_inscrito');
    }
}
