<?php

namespace Database\Seeders;

use App\Models\Comida;
use App\Models\ComidaReceta;
use App\Models\ComidaRecetas;
use App\Models\Receta;
use Illuminate\Database\Seeder;

class ComidaRecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comida=Comida::all()->first();
        $r=Receta::all();

        ComidaRecetas::create([
            'cantidad'=>1,
            'medida'=>'P',
            'cumplido'=>false,
            'fechaHora_establecida'=>'2021-11-30 07:00:00',
            'comida_id'=>1,
            'receta_id'=>$r->where('nombre', '=', 'Ensalada de aguacate y naranja')->first()->id
        ]);
    }
}
