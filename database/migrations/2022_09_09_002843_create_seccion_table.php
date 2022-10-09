<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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
