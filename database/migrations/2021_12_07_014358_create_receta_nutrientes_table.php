<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaNutrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_nutrientes', function (Blueprint $table) {
            $table->id();
            $table->decimal('cantidad',8,2);
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('nutriente_id');
            $table->foreign('receta_id')->references('id')->on('recetas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nutriente_id')->references('id')->on('nutrientes');
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
        Schema::dropIfExists('receta_nutrientes');
    }
}
