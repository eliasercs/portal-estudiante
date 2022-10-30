<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Asistente');
            $table->date('Fecha');
            $table->Time('Hora');

            $table->foreign('Asistente')->references('id')->on('social_assistants')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_reservations_hours');
    }
}
