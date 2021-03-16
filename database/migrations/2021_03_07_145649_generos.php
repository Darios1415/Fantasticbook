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
<<<<<<< HEAD

=======
>>>>>>> f5bd893c5562effed1700315db9ed835d0c3a912
            $table->string('descripcion' ,50);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
<<<<<<< HEAD

=======
            $table->softDeletesTz();
>>>>>>> f5bd893c5562effed1700315db9ed835d0c3a912
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
