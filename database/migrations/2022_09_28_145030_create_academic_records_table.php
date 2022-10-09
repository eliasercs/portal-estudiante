<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger("rut")->unique();
            $table->string("carrera");
            $table->string("codigo");
            $table->integer("plan");
            $table->dateTime('ingreso')->default(now());
            $table->string("situacion");
            
            $table->foreign("rut")->references("rut")->on("users")->onDelete("cascade")->onUpdate('cascade');;
            $table->foreign('codigo')->references('code')->on('carrera');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_records');
    }
}