<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaNutricionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_nutricionistas', function (Blueprint $table) {
            $table->id();

            $table->timestamp('fecha_hora');
            $table->time('tiempoDeConsulta');
            $table->foreignId('consultorio_id')->references('id')->on('consultorios')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('consulta_id')->references('id')->on('consultas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nutricionista_id')->references('id')->on('nutricionistas')
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
        Schema::dropIfExists('consulta_nutricionistas');
    }
}
