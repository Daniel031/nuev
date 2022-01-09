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
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '2021-10-02',
                'tipo_control' => true,
                'tratamiento_id' => 1,
            ],
            [
                'fecha' => '2021-10-13',
                'tipo_control' => true,
                'tratamiento_id' => 2,
            ],
            [
                'fecha' => '2021-10-23',
                'tipo_control' => true,
                'tratamiento_id' => 2,
            ],
        ]);
        foreach ($controls as $control) {
            Control::create($control);
        }
    }
}
