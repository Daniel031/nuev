<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->foreignId('tipo_nutriente_id')->references('id')->on('tipo_nutrientes');
            $table->foreignId('unidad_medida_id')->references('id')->on('unidad_medidas');
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
        Schema::dropIfExists('nutrientes');
    }
}
