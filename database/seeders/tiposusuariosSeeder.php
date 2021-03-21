<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tiposusuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['rol' => 'Administrador'],
            ['rol' => 'Autor'],
            ['rol' => 'Usuarios'],
        ];
            DB::table('tiposusuarios')->insert($data);
    }
}