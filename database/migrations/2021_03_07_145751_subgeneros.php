<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subgeneros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subgeneros',function(Blueprint $table){
            $table->increments('idsg');
            $table->string('nombre' ,50);
            $table->string('descripcion' ,50);
<<<<<<< HEAD




=======
>>>>>>> f5bd893c5562effed1700315db9ed835d0c3a912
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
        Schema::drop('subgeneros');
    }
}
