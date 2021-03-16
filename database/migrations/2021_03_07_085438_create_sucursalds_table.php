<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursaldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursalds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->integer('telefono');
            $table->string('municipio',50);
            $table->string('calle',50);
            $table->string('interior',9);
            $table->string('exterior',9);
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
        Schema::dropIfExists('sucursalds');
    }
}
