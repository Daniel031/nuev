<?php

namespace Database\Seeders;

use App\Models\Control;
use Illuminate\Database\Seeder;

class ControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $controls = ([
            [

                'fecha' => '2021-09-22',
                'tipo_control' => true,
                'cumplido' => true,
                'cantidadSemanal' => 3,
                'promedioDiario' => 300,
                'gastoActividad' => 2133,
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '2021-02-10',
                'tipo_control' => true,
                'cumplido' => true,
                'cantidadSemanal' => 4,
                'promedioDiario' => 400,
                'gastoActividad' => 4133,
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '2021-10-13',
                'tipo_control' => true,
                'cumplido' => false,
                'cantidadSemanal' => 3,
                'promedioDiario' => 250,
                'gastoActividad' => 1133,
                'tratamiento_id' => 2,
            ],
            [
                'fecha' => '2021-10-23',
                'tipo_control' => true,
                'cantidadSemanal' => 5,
                'promedioDiario' => 650,
                'gastoActividad' => 4133,
                'cumplido' => false,
                'tratamiento_id' => 2,
            ],
        ]);
        foreach ($controls as $control) {
            Control::create($control);
        }
    }
}
