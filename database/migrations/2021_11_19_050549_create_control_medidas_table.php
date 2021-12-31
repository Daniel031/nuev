<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_medidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('control_id')->references('id')->on('controls')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('medida_id')->references('id')->on('medidas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->float('cantidad');
            $table->foreignId('unidad_medida_id')->references('id')->on('unidad_medidas')
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
        Schema::dropIfExists('control_medidas');
    }
}
