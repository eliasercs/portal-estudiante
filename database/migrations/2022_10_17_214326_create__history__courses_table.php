<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("record");
            $table->unsignedSmallInteger("Año");
            $table->unsignedSmallInteger("Semestre");
            $table->string('Sigla');
            $table->string("Curso");
            $table->unsignedSmallInteger("Creditos");
            $table->unsignedfloat("Nota");

            $table->foreign("record")->references("id")->on("academic_records")->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_history__courses');
    }
}
