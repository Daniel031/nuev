<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_control', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('control_id');

            $table->foreign('actividad_id')->references('id')->on('actividads');
            $table->foreign('control_id')->references('id')->on('controls');

            $table->unsignedInteger('cantidadSemanal');
            $table->unsignedInteger('tiempoDiario');
            $table->unsignedInteger('promedioDiario')->nullable();
            $table->unsignedInteger('gastoActividad')->nullable();//gasto total de toda la actividad
            $table->timestamp('fechaHora_establecida')->nullable();
            $table->timestamp('fechaHora_cumplida')->nullable();
            $table->boolean('cumplida')->default(false);
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
        Schema::dropIfExists('actividad_control');
    }
}
