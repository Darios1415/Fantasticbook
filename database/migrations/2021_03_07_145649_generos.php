<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Generos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos',function(Blueprint $table){
            $table->increments('idgenero');
            $table->string('nombre' ,50);

            $table->string('descripcion' ,50);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('generos');
    }
}
