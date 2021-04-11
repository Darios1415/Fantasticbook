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
            $table->string('Telefono', 25);
            $table->string('Correo', 25);
            $table->string('Estado', 25);
            $table->string('Municipio', 25);
            $table->string('Localidad', 25);
            $table->string('Calle', 25);
            $table->string('Numeroint', 25);
            $table->string('Numeroext', 25);
            $table->string('Foto');
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
