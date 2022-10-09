<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro');
            $table->unsignedBigInteger('seccion');
            $table->dateTime('Fecha')->default(now());

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
        Schema::dropIfExists('inscripcion');
    }
}