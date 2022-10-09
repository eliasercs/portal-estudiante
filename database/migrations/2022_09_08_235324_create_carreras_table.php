<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Tabla carrera, en esta va la informacion asociada a la carrera
     * tendra por clave primaria un codigo, como esta en el portal actual, por ej "INFO" para informatica
     * como datos guardaremos el nombre completo de la carrera, ubicacion con esto se refiere al lugar fisico en donde esta ubicado
     * y un campo asociado al contacto, en donde los usuarios puedan comunicarse con la direccion de carrera. 
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
