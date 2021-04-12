<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provedors', function (Blueprint $table) {
            $table->bigIncrements('idpro');
            $table->string('nombre', 25);
            $table->string('apellidoP', 25);
            $table->string('apellidoM', 25);
            $table->string('telefono', 25);
            $table->string('correo', 25);
            $table->string('estado', 25);
            $table->string('municipio', 25);
            $table->string('localidad', 25);
            $table->string('calle', 25);
            $table->string('numeroint', 25);
            $table->string('numeroext', 25);
            $table->string('foto');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provedors');
    }
}
