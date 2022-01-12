<?php

namespace Database\Seeders;

use App\Models\HistoriaClinica;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class HistoriaClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p=Paciente::all();

        HistoriaClinica::create([

                'peso'=>70,
                'descripcionPatologia'=>"Tiene diabetes",
                'medicamentos'=>'ninguno',
                'antecedentePersonal'=>'ninguno',
                'antecedenteFamiliar'=>'ninguno',
                'otraInformacion'=>'ninguno',
                'paciente_id'=>3,

        ]);
        HistoriaClinica::create([
                'peso'=>65,
                'descripcionPatologia'=>"Tiene chagas",
                'medicamentos'=>'ninguno',
                'antecedentePersonal'=>'ninguno',
                'antecedenteFamiliar'=>'ninguno',
                'otraInformacion'=>'ninguno',
                'paciente_id'=>2,

        ]);
    }
}
