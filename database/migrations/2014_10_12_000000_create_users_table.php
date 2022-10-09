<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Tabla usuarios, en esta se guarda la informacion de los usuarios
     * posee por clave primaria el rut, el cual debe ser unico
     * tendra un email, por el cual este ingresara a la plataforma, por lo que tambien debera ser unico
     * la funcion timestamp() registra la fecha de registro y modificacion de una tabla
     * remembertoken() es una funcion utilizada en laravel para temas asociados con la sesion (ni idea de lo que hace al 100%)
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('rut')->unique()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
