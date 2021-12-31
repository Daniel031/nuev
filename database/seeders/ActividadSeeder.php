<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Seeder;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividads = ([
            ['nombre' => '3 series de x12 Planchas en tripode',
                'MET' => 3,
                'ctte' => 0.0175,
                'tipo' => 'F',
            ],
            ['nombre' => '3 series de 10 Abdominales',
                'MET' => 4,
                'ctte' => 0.0175,
                'tipo' => 'F',
            ],
            ['nombre' => '5 series de 5 veces de sentadillas',
                'MET' => 4,
                'ctte' => 0.0175,
                'tipo' => 'F',
            ],
            ['nombre' => 'Tomar 2,5 litros de agua',

                'tipo' => 'C',
            ],
        ]);
        foreach ($actividads as $actividad) {
            Actividad::create($actividad);
        }
    }
}
