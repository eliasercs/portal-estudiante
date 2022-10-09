<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicRecordsTable extends Migration
{
    /**
     * en esta tabla estara almacenada toda la informacion asociada a los registros academicos,
     * en donde tendran un id autoincremental como clave primaria
     * los registros academicos estas relacionados a un usuario, por lo que estaran asociados a un determinado usuario por su rut
     * tambien estan asociados a una carrera, por lo que estaran asociados con la tabla carreras, mediante el codigo de la carrera
     * como parametros llevara el plan, que indica el plan curricular que esta cursando
     * la fecha de ingreso, el cual se establece inmediatamente al realizar la inscripcion
     * y su situacion academica (no se que es xd)
     */
    public function up()
    {
        Schema::create('academic_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("rut")->unique();
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