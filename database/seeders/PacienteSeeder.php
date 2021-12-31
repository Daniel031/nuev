<?php

namespace Database\Seeders;

use App\Models\Nutricionista;
use App\Models\Paciente;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $p=Persona::all();
        $p=$p->where('tipo','=','P');
        $n=Nutricionista::all()->first();
        Paciente::create([
            'id'=>$p->first()->id,
            'nutricionista_id'=>$n->id
        ]);
        Paciente::create([
            'id'=>$p->find(3)->id,
            'nutricionista_id'=>$n->id
        ]);
    }
}
