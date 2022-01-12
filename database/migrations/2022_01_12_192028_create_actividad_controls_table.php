<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_controls', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('tiempoDiario');

            $table->timestamp('fechaHora_establecida');
            $table->timestamp('fechaHora_cumplida')->nullable();
            $table->boolean('cumplida')->default('false');

            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('control_id');

            $table->foreign('actividad_id')->references('id')->on('actividads');
            $table->foreign('control_id')->references('id')->on('controls');

<<<<<<< HEAD:database/migrations/2021_11_28_224831_create_actividad_control_table.php
            $table->unsignedInteger('cantidadSemanal');
            $table->unsignedInteger('tiempoDiario');
            $table->unsignedInteger('promedioDiario')->nullable();
            $table->unsignedInteger('gastoActividad')->nullable();//gasto total de toda la actividad
            $table->timestamp('fechaHora_establecida')->nullable();
            $table->timestamp('fechaHora_cumplida')->nullable();
            $table->boolean('cumplida')->default(false);
=======
>>>>>>> 2d81ba4140b7800bcc02b6382fb5976514d74f80:database/migrations/2022_01_12_192028_create_actividad_controls_table.php
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
        Schema::dropIfExists('actividad_controls');
    }
}
