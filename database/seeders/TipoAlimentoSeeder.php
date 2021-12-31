<?php

namespace Database\Seeders;

use App\Models\TipoAlimento;
use Illuminate\Database\Seeder;

class TipoAlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoA=([
            [
                'nombre'=>'fruta',
            ],
            [
                'nombre'=>'verdura',
            ],
            [
                'nombre'=>'carne roja',
            ],
            [
                'nombre'=>'carne blanca',
            ],
            [
                'nombre'=>'bebida',
            ],
            [
                'nombre'=>'suplemento',
            ],
            [
                'nombre'=>'receta',
            ],
            [
                'nombre'=>'lácteo',
            ],
            [
                'nombre'=>'lípido',
            ],
            [
                'nombre'=>'condimento',
            ]
        ]);
        foreach ($tipoA as $tipo) {
            TipoAlimento::create($tipo);
        }
    }
}
