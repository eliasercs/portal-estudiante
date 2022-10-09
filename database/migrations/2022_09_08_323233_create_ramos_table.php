<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamosTable extends Migration
{
    /**
     * Tabla ramos, en esta se encuentra toda la informacion asociado a los ramos de la universidad
     * estos tendran como clave primaria el codigo por el cual son reconocidos, como esta en el portal actual
     * como parametros, esta tendra el nombre completo del ramo, la cantidad de creditos que necesita
     * esta estara asociada a una carrera especfica, relacionandose con la tabla carreras mediante una clave foranea
     * tambien llevara el tipo de ramo como parametro, esto refiriendose se si trata de un ramo diciplinar, un electivo teologico,
     * electivo antropologico, un ramo diciplinar, un ramo interdiciplinar, entre otros.
     */
    public function up()
    {
        Schema::create('ramos', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('nombre');
            $table->integer('creditos');
            $table->string('carrera');
            $table->string('tipo');
            //$table->foreign('carrera')->references('code')->on('carrera')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ramos');
    }
}
