<?php

namespace Database\Seeders;

use App\Models\Suscripcion;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripcion::create([
            'nombre'=>'Prueba gratuita',
            'meses'=> '0',
            'monto_total'=>'0'
             ]);
    }
}
