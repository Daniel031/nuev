<?php

namespace Database\Seeders;

use App\Models\Alimento;
use App\Models\AlimentoRecetas;
use Illuminate\Database\Seeder;

class AlimentoRecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = Alimento::all();

        $ar = ([
            [
                'peso' => 200,
                'alimento_id' => $a->where('nombre', '=', 'Espinaca')->first()->id,
                'receta_id' => 1],
            [
                'peso' => 600,
                'alimento_id' => $a->where('nombre', '=', 'Aguacate')->first()->id,
                'receta_id' => 1],
            [
                'peso' => 40,
                'alimento_id' => $a->where('nombre', '=', 'Aceituna')->first()->id,
                'receta_id' => 1],
            [
                'peso' => 5,
                'alimento_id' => $a->where('nombre', '=', 'Aceite de oliva')->first()->id,
                'receta_id' => 1],
            [
                'peso' => 5,
                'alimento_id' => $a->where('nombre', '=', 'Vinagre')->first()->id,
                'receta_id' => 1],
            [
                'peso' => 90,
                'alimento_id' => $a->where('nombre', '=', 'Naranja')->first()->id,
                'receta_id' => 1],
        ]);

        foreach ($ar as $r) {
            AlimentoRecetas::create($r);
        }
    }
}
