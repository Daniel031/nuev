<?php

namespace Database\Seeders;

use App\Models\Nutriente;
use App\Models\UnidadMedida;
use Illuminate\Database\Seeder;

class NutrienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidadmedidas = UnidadMedida::all();
        $nutriente = ([
            //macronutrientes
            ['nombre' => 'Energía',
                'tipo_nutriente_id' => 1,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'kilocalorias')->first()->id],
            ['nombre' => 'Grasa',
                'tipo_nutriente_id' => 1,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'gramos')->first()->id],
            ['nombre' => 'H. Carbono',
                'tipo_nutriente_id' => 1,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'gramos')->first()->id],
            ['nombre' => 'Proteína',
                'tipo_nutriente_id' => 1,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'gramos')->first()->id],
//micronutrientes
            ['nombre' => 'Colesterol',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
            ['nombre' => 'Fibra alimentaria',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'gramos')->first()->id],
            ['nombre' => 'Sodio',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
            ['nombre' => 'Agua',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('nombre', '=', 'gramos')->first()->id],

            ['nombre' => 'Vitamina A',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
            ['nombre' => 'Vitamina B6',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
            ['nombre' => 'Vitamina C',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
            ['nombre' => 'Vitamina D',
                'tipo_nutriente_id' => 2,
                'unidad_medida_id' => $unidadmedidas->where('abreviacion', '=', 'mg')->first()->id],
        ]);
        foreach ($nutriente as $nu) {
            Nutriente::create($nu);
        }


    }
}
