<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('sucursales', function (Blueprint $table) {
             $table->increments('idsucur');
             $table->string('nombre',30);
             $table->string('telefono',10);
             $table->string('calle',50);
             $table->string('interior',9);
             $table->string('exterior',9);
             $table->string('codigo',9);
             $table->string('postal',9);
             $table->string('correo');
             $table->enum('activo',['si','no']);
             $table->string('img',255)->nullable();
             $table->unsignedBigInteger('idmun');
             $table->unsignedBigInteger('idestados');
             $table->foreign('idmun')->references('idmun')->on('municipios');
             $table->foreign('idestados')->references('idestados')->on('estados');
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
        Schema::drop('sucursales');
    }
}
