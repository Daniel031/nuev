<?php

namespace Database\Seeders;

use App\Models\Nutriente;
use Illuminate\Database\Seeder;
use App\Models\AlimentoNutriente;
use App\Models\AlimentoNutrientes;

class AlimentoNutrientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $an = ([
            [
                'cantidad' => 200,
                'alimento_id' => 1,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 1,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 1,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 20,
                'alimento_id' => 1,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 1,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 1,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 1,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 1,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 1,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 1,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 1,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 1,
                'nutriente_id' => 12,
            ],
            //alimento 2
            [
                'cantidad' => 80,
                'alimento_id' => 2,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 120,
                'alimento_id' => 2,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 2,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 210,
                'alimento_id' => 2,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 2,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 2,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 2,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 2,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 2,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 2,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 2,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 2,
                'nutriente_id' => 12,
            ],
            //*******************alimento 3********* *
            [
                'cantidad' => 400,
                'alimento_id' => 3,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 120,
                'alimento_id' => 3,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 3,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 200,
                'alimento_id' => 3,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 3,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 3,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 3,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 3,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 3,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 3,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 3,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 3,
                'nutriente_id' => 12,
            ],
            // alimento 4
            [
                'cantidad' => 280,
                'alimento_id' => 4,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 110,
                'alimento_id' => 4,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 510,
                'alimento_id' => 4,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 310,
                'alimento_id' => 4,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 4,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 4,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 4,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 4,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 4,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 4,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 4,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 4,
                'nutriente_id' => 12,
            ],
            //***********alimento 5*********************
            [
                'cantidad' => 280,
                'alimento_id' => 5,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 250,
                'alimento_id' => 5,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 35,
                'alimento_id' => 5,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 320,
                'alimento_id' => 5,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 5,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 5,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 5,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 5,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 5,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 5,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 5,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 5,
                'nutriente_id' => 12,
            ],

            //alimento 6
            [
                'cantidad' => 230,
                'alimento_id' => 6,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 260,
                'alimento_id' => 6,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 60,
                'alimento_id' => 6,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 80,
                'alimento_id' => 6,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 6,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 6,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 6,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 6,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 6,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 6,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 6,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 6,
                'nutriente_id' => 12,
            ],

            // ***********alimento 7****************
            [
                'cantidad' => 290,
                'alimento_id' => 7,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 155,
                'alimento_id' => 7,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 40,
                'alimento_id' => 7,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 20,
                'alimento_id' => 7,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 7,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 7,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 7,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 7,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 7,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 7,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 7,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 7,
                'nutriente_id' => 12,
            ],

            //alimento 8
            [
                'cantidad' => 90,
                'alimento_id' => 8,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 110,
                'alimento_id' => 8,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 70,
                'alimento_id' => 8,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 510,
                'alimento_id' => 8,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 8,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 8,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 8,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 8,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 8,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 8,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 8,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 8,
                'nutriente_id' => 12,
            ],

            //************alimento 9***********
            [
                'cantidad' => 700,
                'alimento_id' => 9,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 77,
                'alimento_id' => 9,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 39,
                'alimento_id' => 9,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 9,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 9,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 9,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 9,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 9,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 9,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 9,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 9,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 9,
                'nutriente_id' => 12,
            ],

            //alimento 10
            [
                'cantidad' => 580,
                'alimento_id' => 10,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => 190,
                'alimento_id' => 10,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 10,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => 24,
                'alimento_id' => 10,
                'nutriente_id' => 4,
            ],
            [
                'cantidad' => 10,
                'alimento_id' => 10,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => 50,
                'alimento_id' => 10,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => 30,
                'alimento_id' => 10,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => 0,
                'alimento_id' => 10,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => 205,
                'alimento_id' => 10,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => 150,
                'alimento_id' => 10,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => 300,
                'alimento_id' => 10,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => 22,
                'alimento_id' => 10,
                'nutriente_id' => 12,
            ],

        ]);

        foreach ($an as $a) {
            AlimentoNutrientes::create($a);
        }
    }
}
