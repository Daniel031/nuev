<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatologiaAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patologia_alimentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patologia_id')->references('id')->on('patologias')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('alimento_danino_id')->references('id')->on('alimento_daninos')
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
        Schema::dropIfExists('patologia_alimentos');
    }
}
