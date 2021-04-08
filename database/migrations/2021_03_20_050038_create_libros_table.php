<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('idlibro');
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
<<<<<<< HEAD:database/migrations/2021_03_20_050038_create_libros_table.php
        Schema::dropIfExists('libros');
=======
        Schema::drop('libros');
>>>>>>> 6a40e462f34f88e9b74f6ebe62843353ff6840eb:database/migrations/2021_03_04_083826_libros.php
    }
}
