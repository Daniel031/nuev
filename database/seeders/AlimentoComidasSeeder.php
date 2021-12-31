<?php

namespace Database\Seeders;

use App\Models\Alimento;
use App\Models\AlimentoComidas;
use Illuminate\Database\Seeder;

class AlimentoComidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a=Alimento::all();
        AlimentoComidas::create([
            'cantidad'=>'250',
            'cumplido'=>false,
            'fechaHora_establecida'=>'2021-11-30 07:00:00',
            'comida_id'=>1,
            'alimento_id'=>$a->where('nombre', '=', 'Naranja')->first()->id
        ]);
        AlimentoComidas::create([
            'cantidad'=>'500',
            'cumplido'=>false,
            'fechaHora_establecida'=>'2021-11-30 07:00:00',
            'comida_id'=>1,
            'alimento_id'=>$a->where('nombre', '=', 'Néctar de mango')->first()->id
        ]);
    }
}
