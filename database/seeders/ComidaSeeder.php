<?php

namespace Database\Seeders;

use App\Models\Alimento;
use App\Models\Comida;
use App\Models\Receta;
use Illuminate\Database\Seeder;

class ComidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comidas = ([
            ['nombre' => 'Desayuno',
             'hora'=>'08:00',
             'alimento_id'=>1],
            ['nombre' => 'brunch',
            'hora'=>'10:00',
            'alimento_id'=>2],
            ['nombre' => 'Almuerzo',
            'hora'=>'12:00',
            'alimento_id'=>3],
            ['nombre' => 'Siesta',
            'hora'=>'15:00',
            'alimento_id'=>4],
            ['nombre' => 'Cena',
            'hora'=>'18:00',
            'alimento_id'=>5],
        ]);
        foreach ($comidas as $c) {
            Comida::create($c);
        }
        /*
        $comida=Comida::all()->first();
        $r=Receta::all();
        $a=Alimento::all();
        $comida->recetas()->attach($r->where('nombre', '=', 'Ensalada de aguacate y naranja')->first()->id,
        ['cantidad'=>1,'medida'=>'P','cumplido'=>false,'fechaHora_establecida'=>'2021-11-30 07:00:00']);
        $comida->alimentos()->attach($a->where('nombre', '=', 'Naranja')->first()->id,
        ['cantidad'=>'250','cumplido'=>false,'fechaHora_establecida'=>'2021-11-30 07:00:00']);
        $comida->alimentos()->attach($a->where('nombre', '=', 'Néctar de mango')->first()->id,
        ['cantidad'=>'500','cumplido'=>false,'fechaHora_establecida'=>'2021-11-30 07:00:00']);*/
    }
}
