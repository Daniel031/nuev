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
                'fechaNacimiento' => '04-01-2000',
                'sexo' => 'M',
                'celular' => '77273232',
                'correo' => 'Nutridiet@gmail.com',
                'tipo'=> 'N',
                'user_id'=>1
            ],
            [
                'ci' => '1234123s',
                'nombres' => 'Daniel',
                'apellidos' => 'Maldonado Gutierrez',
                'fechaNacimiento' => '12-03-1999',
                'sexo' => 'M',
                'celular' => '67748378',
                'correo' => 'DanielM@gmail.com',
                'tipo'=>'P',
                'user_id'=>2
            ],
            [
                'ci' => '9821747',
                'nombres' => 'Junior',
                'apellidos' => 'Llanos',
                'fechaNacimiento' => '10-05-1999',
                'sexo' => 'M',
                'celular' => '78988739',
                'correo' => 'Junior78@gmail.com',
                'tipo'=>'P',
                'user_id'=>3
            ]
        ]);
        foreach ($personas as $persona){
            Persona::create($persona);
        }
    }
}
