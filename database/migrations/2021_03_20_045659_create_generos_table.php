<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->bigIncrements('idgen');
            $table->string('nombre' ,50)->nulleable;
            $table->string('descripcion' ,50);
<<<<<<< HEAD:database/migrations/2021_03_20_045659_create_generos_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }

=======
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
    });
}
>>>>>>> 6a40e462f34f88e9b74f6ebe62843353ff6840eb:database/migrations/2021_03_07_145751_subgeneros.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generos');
    }
}
