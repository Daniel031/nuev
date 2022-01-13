<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComidaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comida_grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->references('id')->on('grupos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('comida_id')->references('id')->on('comidas')
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
        Schema::dropIfExists('comida_grupos');
    }
}
