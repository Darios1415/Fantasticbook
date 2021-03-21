<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros',function(Blueprint $table){
            $table->increments('idlibro');
            $table->string('nombre',50);
            $table->string('autor',40);
            $table->integer('paginas');
            $table->string('fechap',15);
            $table->string('idioma',10);
            $table->string('sinopsis',160);
            $table->string('disponibilidad',8);
            $table->decimal('precio', 4, 2);
            $table->string('archivo',30);
            $table->string('foto',30);
            $table->integer('idgen')->unsigned();
            $table->integer('idsubgen')->unsigned();
            $table->rememberToken();
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
        Schema::drop('libros');
    }
}
