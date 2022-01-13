<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consulta;


class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $consultorios = ([
            [
                'confirmada' => true,
                'motivoConsulta' => 'Aumento de peso',
                'expectativa'=>'Disminucion de peso',
                'paciente_id' => 2,
            ],
            [
                'confirmada' => false,
                'motivoConsulta' => 'dolor punzante en el estomago',
                'expectativa'=>'plan de alimentacion para regular la acidez',
                'paciente_id' => 2,
            ],
            [
                'confirmada' => true,
                'motivoConsulta' => 'Registro de Activides proximas',
                'expectativa'=>'rutina de actividades para bajar de peso',
                'paciente_id' => 3,
            ],
            [
                'confirmada' => true,
                'motivoConsulta' => 'Dolor articular por falta de calcio',
                'expectativa'=>'plan de alimentacion para aumentar la vitalidad',
                'paciente_id' => 3,
            ],
        ]);
        foreach ($consultorios as $consultorio) {
            Consulta::create($consultorio);
        }

    }
}
