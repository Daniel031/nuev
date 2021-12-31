<?php

namespace Database\Seeders;

use App\Models\TipoNutriente;
use Illuminate\Database\Seeder;

class TipoNutrienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n=([
            ['nombre'=>'Macronutrientes'],
            ['nombre'=>'Micronutrientes'],
        ]);
        foreach ($n as $nu) {
            TipoNutriente::create($nu);
        }
    }
}
