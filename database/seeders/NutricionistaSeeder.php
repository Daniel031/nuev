<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Nutricionista;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class NutricionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            'id'=>'3'
        ]);
        Nutricionista::create([
            'id'=>1,
            'profesion'=>'Nutriologo'
             ]);

    }
}
