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
                'fechaInicio' => '10-10-2021',
                'fechaFin' => '22-01-2022',
                'costo' => '2000',
                'completo' => 'false',
                'paciente_id' => 2,
                'activo'=>'true',
            ],
            [
                'objetivo' => 'Aumentar masa muscular',
                'fechaInicio' => '09-08-2021',
                'fechaFin' => '22-12-2021',
                'costo' => '2200',
                'completo' => 'false',
                'paciente_id' => 3,
                'activo'=>'false',
            ],
        ]);
        foreach ($tratamientos as $tratamiento) {
            Tratamiento::create($tratamiento);
        }
    }
}
