<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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

        $perfil = 'perfil';//para direccionar la carpeta
        Storage::deleteDirectory($perfil);//para eliminar la carpeta
        Storage::makeDirectory($perfil);//para crear la carpeta

        $this->call(PersonaSeeder::class);
       $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
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
        $this->call(DiaSeeder::class);
        $this->call(ConsultorioSeeder::class);
        $this->call(ConsultaSeeder::class);
        $this->call(ConsultaNutricionistaSeeder::class);
        $this->call(HistoriaClinicaSeeder::class);
        $this->call(SuscripcionSeeder::class);
    }
}
