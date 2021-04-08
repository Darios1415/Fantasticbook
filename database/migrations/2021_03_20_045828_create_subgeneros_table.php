<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubgenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subgeneros', function (Blueprint $table) {
            $table->bigIncrements('idsg');
            $table->string('nombre' ,50);

            $table->string('descripcion' ,50);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2021_03_20_045828_create_subgeneros_table.php
            $table->softDeletes();
        });
=======
    });
>>>>>>> 6a40e462f34f88e9b74f6ebe62843353ff6840eb:database/migrations/2021_03_07_145649_generos.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subgeneros');
    }
}
