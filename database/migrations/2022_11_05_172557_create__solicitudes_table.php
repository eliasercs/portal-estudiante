<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');

            $table->string('Tipo');
            $table->date('Fecha')->default(now());
            $table->unsignedSmallInteger("Año");
            $table->unsignedSmallInteger("Semestre");
            $table->string('Motivo1');
            $table->string('Motivo2');
            $table->string('Detalle');
            
            $table->foreign('user')->references('id')->on('academic_records')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
