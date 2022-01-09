<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'nutricionista',
            'email'=>'Nutridiet@gmail.com',
            'password'=>bcrypt('12345678'),
         ]);

         User::create([
             'name'=>'Paciente',
             'email'=>'DanielM@gmail.com',
             'password'=>bcrypt('11112222')
         ]);

         User::create([
            'name'=>'Paciente',
            'email'=>'Junior78@gmail.com',
            'password'=>bcrypt('33334444')
        ]);
    }
}
