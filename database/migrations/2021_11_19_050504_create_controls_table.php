<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->boolean('tipo_control');//si es true es una actividad, si es false es una medición
            $table->boolean('cumplido')->nullable();//si es true la actividad ha sido cumplido, false si no ha sido cumplido por el paciente
            $table->foreignId('tratamiento_id')->references('id')->on('tratamientos')
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
        Schema::dropIfExists('controls');
    }
}
