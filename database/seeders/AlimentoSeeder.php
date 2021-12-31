<?php

namespace Database\Seeders;

use App\Models\Alimento;
use App\Models\Nutriente;
use App\Models\TipoAlimento;
use Illuminate\Database\Seeder;

class AlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos=TipoAlimento::all();
        $alimentos = ([
            [
                'nombre' => 'Néctar de mango',
                'nombreComun' => 'Jugo de mango',
                'pesoUnico' => 100, //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','bebida')->first()->id,
            ],
            [
                'nombre' => 'Queso Zamorano',
                'nombreComun' => 'Queso',
                'pesoUnico' => 100, //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','lácteo')->first()->id,
            ],
            [
                'nombre' => 'Yogurt, leche descremada, natural',
                'nombreComun' => 'yogurt',
                'pesoUnico' => 100, //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','lácteo')->first()->id,
            ],
            [
                'nombre' => 'Pollo, ALAS C/PIEL, Cocida',
                'nombreComun' => 'Pollo',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','carne blanca')->first()->id,
            ],
            [
                'nombre' => 'Espinaca',
                'nombreComun' => 'Espinaca',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','verdura')->first()->id,
            ],
            [
                'nombre' => 'Aguacate',
                'nombreComun' => 'Palta',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','fruta')->first()->id,
            ],
            [
                'nombre' => 'Aceituna',
                'nombreComun' => 'Aceituna',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','fruta')->first()->id,
            ],
            [
                'nombre' => 'Aceite de oliva',
                'nombreComun' => 'Aceite de oliva',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','lípido')->first()->id,
            ],
            [
                'nombre' => 'Vinagre',
                'nombreComun' => 'Vinagre',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','condimento')->first()->id,
            ],
            [
                'nombre' => 'Naranja',
                'nombreComun' => 'Naranja',
                'pesoUnico' => '100', //en gramos
                'tipo_alimento_id' => $tipos->where('nombre','=','fruta')->first()->id,
            ]
        ]);
        foreach ($alimentos as $alimento) {
            Alimento::create($alimento);
        }

        /*$alimento=Alimento::all()->first();
        $n=Nutriente::all();
        $alimento->nutrientes()->attach($n->where('nombre','=','Energía')->first()->id,['cantidad'=>200]);
        $alimento->nutrientes()->attach($n->where('nombre','=','H. Carbono')->first()->id,['cantidad'=>50]);
        $alimento->nutrientes()->attach($n->where('nombre','=','Grasa')->first()->id,['cantidad'=>100]);
        $alimento->nutrientes()->attach($n->where('nombre','=','Proteína')->first()->id,['cantidad'=>250]);
    */
    }
}
