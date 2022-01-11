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
                'fecha' => '22-09-2021',
                'tipo_control' => 'true',
                'cumplido'=>'true',
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '02-10-2021',
                'tipo_control' => 'true',
                'cumplido'=>'true',
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '13-10-2021',
                'tipo_control' => 'true',
                'cumplido'=>'false',
                'tratamiento_id' => 2,
            ],
            [
                'fecha' => '23-10-2021',
                'tipo_control' => 'true',
                'cumplido'=>'false',
                'tratamiento_id' => 2,
            ],
        ]);
        foreach ($controls as $control) {
            Control::create($control);
        }
    }
}
