<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionTable extends Migration
{
    /**
     * En esta tabla se guardara la informacion correspondientes a las secciones de cada ramo de la universidad,
     * en donde cada seccion tendra como clave foranea un id determinado (planeo cambiarlo a "INFO"+"-1", codigo + -seccion)
     * en donde llevara por parametros un numero, indicando el numero de seccion
     * el curso al que esta asociado, esto asociandose con la tabla ramos
     * el profesor que dicta la seccion, el horario en el que se daran las respectivas clases, la sala en la que se realizaran las clases
     * tambien llevara la capacidad del curso, con esto se refiere a la cantidad maxima de estudiantes que pueden inscribirse
     * y el numero de inscritos, que son los estudiantes actualmente inscritos en dicha seccion.
     */
    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger("numero")->unique();
            $table->string('curso');
            $table->string("profesor");
            $table->string("horario");
            $table->string("sala");
            $table->unsignedSmallInteger("capacidad");
            $table->unsignedSmallInteger("inscritos");
            
            $table->foreign('curso')->references('code')->on('ramos')->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccion');
    }
}
