<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoNutrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_nutrientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->foreignId('alimento_id')->references('id')->on('alimentos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('nutriente_id')->references('id')->on('nutrientes')
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
        Schema::dropIfExists('alimento_nutrientes');
    }
}
