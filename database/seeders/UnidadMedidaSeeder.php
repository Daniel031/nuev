<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $um = ([
            [
                'nombre' => 'gramos',
                'abreviacion' => 'g',
            ],
            [
                'nombre' => 'kilocalorias',
                'abreviacion' => 'kcal',
            ],
            [
                'nombre' => 'porción',
                'abreviacion' => 'pcn',
            ],
            [
                'nombre' => 'miligramos',
                'abreviacion' => 'mg',
            ]
        ]);
        foreach ($um as $u) {
            UnidadMedida::create($u);
        }
    }
}
