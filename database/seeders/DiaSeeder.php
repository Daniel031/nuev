<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create([
            'id'=>1,
            'nombre'=>'Lunes'
             ]);
        Dia::create([
            'id'=>2,
            'nombre'=>'Martes'
             ]);
        Dia::create([
            'id'=>3,
            'nombre'=>'Miercoles'
             ]);
        Dia::create([
            'id'=>4,
            'nombre'=>'Jueves'
            ]);
        Dia::create([
            'id'=>5,
            'nombre'=>'Viernes'
            ]);
            Dia::create([
            'id'=>6,
            'nombre'=>'Sabado'
            ]);
        Dia::create([
            'id'=>7,
            'nombre'=>'Domingo'
            ]);
    }
}
