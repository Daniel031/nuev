<?php

namespace Database\Seeders;

use App\Models\Alimento;
use App\Models\Comida;
use App\Models\Receta;
use Illuminate\Database\Seeder;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receta::create([

                'nombre' => 'Ensalada de aguacate y naranja',
                'preparacion' => '1. En primer lugar, nos encargaremos de preparar los alimentos. Es decir, quitaremos los huesos de las aceitunas, la piel del aguacate y la cáscara de la naranja.
                2. Trocearemos la naranja y el aguacate en tacos, para que se puedan mezclar de forma homogénea con el resto de ingredientes. Realizaremos la misma operación con las espinacas (aunque en este caso deberemos cortarlas en trozos más pequeños y manejables), en caso de que las hojas sean demasiado grandes.
                3. En una ensaladera, echaremos las espinacas tras haberlas lavado previamente.
                4. Echaremos los trozos de naranja y aguacate, junto con las aceitunas al recipiente. Luego, procederemos a mezclarlos.
                5. Aderezaremos la ensalada con un chorro de aceite y vinagre para darle un mayor sabor',
                'peso' => 900,
                'porcion' => 2,

        ]);

        /*$a = Alimento::all();
        $receta = Receta::all()->find(1);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Espinaca')->first()->id,['peso' => 200,]);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Aguacate')->first()->id,['peso' => 600]);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Aceituna')->first()->id,['peso' => 40]);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Aceite de oliva')->first()->id,['peso' => 5]);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Vinagre')->first()->id,['peso' => 5]);
        $receta->alimentos()->attach($a->where('nombre', '=', 'Naranja')->first()->id,['peso' => 90]);
*/
        // Desayuno, Bruch, Almuerzo, Siesta, Cena
        //'cantidad','medida'(puede ser P=Porcion, G=gramos),'cumplido','fechaHora_establecida','fechaHora_cumplida'


    }
}
