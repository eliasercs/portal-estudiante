<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolNotapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sol_notap', function (Blueprint $table) {
            $table->id();
            #$table->unsignedBigInteger("sol_id")->unique();
            $table->year("anio");
            $table->string('semestre');
            $table->string('fecha')->default(now());
            $table->string('tip_solicitud');
            $table->string("estado");
            $table->string('pdf');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sol_notap');
    }
}
