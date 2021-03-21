<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class municipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Acambay'], ['nombre' => 'Toluca'], ['nombre' => 'Metepec'],
            ['nombre' => 'Almoloya de Juarez'], ['nombre' => 'Xonacatlan'], ['nombre' => 'Lerma'],
            ['nombre' => 'Atarasquillo'],
        ];
        DB::table('municipios')->insert($data);
    }
}
