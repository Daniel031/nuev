<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComidaRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida_recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->string('medida',1);
            $table->boolean('cumplido');
            $table->timestamp('fechaHora_establecida');
            $table->timestamp('fechaHora_cumplida')->nullable();

            $table->foreignId('comida_id')->references('id')->on('comidas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('receta_id')->references('id')->on('recetas')
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
        Schema::dropIfExists('comida_recetas');
    }
}
