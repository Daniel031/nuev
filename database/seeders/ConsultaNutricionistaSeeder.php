<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsultaNutricionista;

class ConsultaNutricionistaSeeder extends Seeder
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
                'fecha_hora' => '2021-09-22 10:00:00',
                'tiempoDeConsulta' => '1:00:00',
                'consultorio_id'=>1,
                'nutricionista_id' => 1,
                'consulta_id' => 1,
            ],
            [
                'fecha_hora' => '2021-09-22 12:00:00',
                'tiempoDeConsulta' => '1:00:00',
                'consultorio_id'=>2,
                'nutricionista_id' => 1,
                'consulta_id' => 2,
            ],
            [
                'fecha_hora' => '2021-09-22 13:00:00',
                'tiempoDeConsulta' => '1:00:00',
                'consultorio_id'=>3,
                'nutricionista_id' => 1,
                'consulta_id' => 3,
            ],
            [
                'fecha_hora' => '2022-01-22 15:00:00',
                'tiempoDeConsulta' => '1:00:00',
                'consultorio_id'=>4,
                'nutricionista_id' => 1,
                'consulta_id' => 4,
            ],
        ]);
        foreach ($consultorios as $consultorio) {
            ConsultaNutricionista::create($consultorio);
        }
       
    }
}
