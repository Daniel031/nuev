<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $personas = ([
            [
                'ci' => '2045923j',
                'nombres' => 'Christian Celso',
                'apellidos' => 'Mamani Soliz',
                'fechaNacimiento' => '2000-04-01',
                'sexo' => 'M',
                'celular' => '77273232',
                'correo' => 'Nutridiet@gmail.com',
                'tipo'=> 'N',
            ],
            [
                'ci' => '1234123s',
                'nombres' => 'Daniel',
                'apellidos' => 'Maldonado Gutierrez',
                'fechaNacimiento' => '1999-12-03',
                'sexo' => 'M',
                'celular' => '67748378',
                'correo' => 'DanielM@gmail.com',
                'tipo'=>'P',
            ],
            [
                'ci' => '9821747',
                'nombres' => 'Junior',
                'apellidos' => 'Llanos',
                'fechaNacimiento' => '1999-10-05',
                'sexo' => 'M',
                'celular' => '78988739',
                'correo' => 'Junior78@gmail.com',
                'tipo'=>'P',
            ]
        ]);
        foreach ($personas as $persona){
            Persona::create($persona);
        }
    }
}
