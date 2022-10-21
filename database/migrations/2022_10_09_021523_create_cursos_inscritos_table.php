<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosInscritosTable extends Migration
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
        Schema::create('cursos_inscritos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academic_record_id');
            $table->unsignedBigInteger('seccion_id');
            $table->dateTime('fecha')->default(now());
            $table->unsignedInteger('asistencia')->nullable();

            $table->foreign('academic_record_id')->references('id')->on('academic_records')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos_inscritos');
    }
}
