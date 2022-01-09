<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tratamientos = ([
            [
                'objetivo' => 'Bajar de peso',
                'fechaInicio' => '2021-10-10',
                'fechaFin' => '2022-01-22',
                'costo' => '2000',
                'completo' => false,
                'paciente_id' => 2,
            ],
            [
                'objetivo' => 'Aumentar masa muscular',
                'fechaInicio' => '2021-09-08',
                'fechaFin' => '2021-12-22',
                'costo' => '2200',
                'completo' => false,
                'paciente_id' => 3,
            ],
        ]);
        foreach ($tratamientos as $tratamiento) {
            Tratamiento::create($tratamiento);
        }
    }
}
