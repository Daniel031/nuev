<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionHabitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_habitos', function (Blueprint $table) {
            $table->id();
            $table->text('funcion_intestinal');
            $table->text('calidad_de_sueno');
            $table->text('fumador');
            $table->text('bebe_alcohol');
            $table->text('raza')->nullable();
            $table->text('estado_civil');
            $table->text('actividad_fisica');
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
        Schema::dropIfExists('informacion_habitos');
    }
}
