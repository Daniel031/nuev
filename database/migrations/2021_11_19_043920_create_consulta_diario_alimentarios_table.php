<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaDiarioAlimentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_diario_alimentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->references('id')->on('consultas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('diario_alimentario_id')->references('id')->on('diario_alimentarios')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('consulta_diario_alimentarios');
    }
}
