<?php

namespace Database\Seeders;

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
        Nutricionista::create([
            'id'=>1,
            'profesion'=>'Nutriologo'
             ]);

    }
}
