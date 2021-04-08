<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autors', function (Blueprint $table) {
            $table->bigIncrements('idau');
            $table->string('nombre',25);
            $table->string('app',25);
            $table->string('apm',25);
            $table->string('sexo',10);
            $table->string('fecha_na',15);
            $table->string('foto');
            $table->string('nacionalidad');
            $table->string('clave_inter');
            $table->string('biografia');
            $table->unsignedBigInteger('idtu');
            $table->unsignedBigInteger('idgen');
            $table->foreign('idtu')->references('idtu')->on('tiposusuarios');
            $table->foreign('idgen')->references('idgen')->on('generos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autors');
    }
}
