<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanAlimentacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_alimentacions', function (Blueprint $table) {
            $table->id();

            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->boolean('activo');
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
        Schema::dropIfExists('plan_alimentacions');
    }
}
