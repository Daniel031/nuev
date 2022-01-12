<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dia_id')->references('id')->on('dias')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grupo_id')->references('id')->on('grupos')
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
        Schema::dropIfExists('dia_grupos');
    }
}
