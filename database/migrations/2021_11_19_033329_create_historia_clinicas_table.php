<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('peso',8,2)->nullable();
            $table->text('descripcionPatologia')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('antecedentePersonal')->nullable();
            $table->text('antecedenteFamiliar')->nullable();
            $table->text('otraInformacion')->nullable();
            $table->foreignId('paciente_id')->references('id')->on('pacientes')
            ->onUpdate('cascade')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia_clinicas');
    }
}
