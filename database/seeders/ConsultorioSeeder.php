<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultorio;

class ConsultorioSeeder extends Seeder
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
                'nombre' => 'consultorio 31',
                'direccion' => 'calle suarez arana #45 segundo piso',
                'horaAtencion'=>'8:00 am - 18:00 pm',
                'nutricionista_id' => 1,
            ],
            [
                'nombre' => 'santa rosa del carmen',
                'direccion' => 'ciudad satelite calle nuevo amanecer',
                'horaAtencion'=>'7:00 am - 17:00 pm',
                'nutricionista_id' => 1,
            ],
            [
                'nombre' => 'san salvador',
                'direccion' => 'calle los piñones #31',
                'horaAtencion'=>'10:00 am - 20:00 pm',
                'nutricionista_id' => 1,
            ],
            [
                'nombre' => 'nueva esperanza',
                'direccion' => 'calle los tajibos #45',
                'horaAtencion'=>'9:00 am - 19:00 pm',
                'nutricionista_id' => 1,
            ],
        ]);
        foreach ($consultorios as $consultorio) {
            Consultorio::create($consultorio);
        }

    }
}
