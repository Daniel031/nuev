<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(PersonaSeeder::class);
       // $this->call(RoleSeeder::class);
        $this->call(NutricionistaSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(TipoAlimentoSeeder::class);
        $this->call(TipoNutrienteSeeder::class);
        $this->call(NutrienteSeeder::class);
        $this->call(AlimentoSeeder::class);
        $this->call(AlimentoNutrientesSeeder::class);
        $this->call(RecetaSeeder::class);
        $this->call(AlimentoRecetasSeeder::class);
        $this->call(ComidaSeeder::class);

        $this->call(ComidaRecetasSeeder::class);
        $this->call(AlimentoComidasSeeder::class);

        $this->call(TratamientoSeeder::class);
        $this->call(ControlSeeder::class);
        $this->call(ActividadSeeder::class);
    }
}
