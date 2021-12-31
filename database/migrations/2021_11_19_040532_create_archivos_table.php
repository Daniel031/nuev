<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',40);
            $table->text('archivo');
            $table->text('descripcion');
            $table->timestamp('fechaRegistrado');
            $table->foreignId('consulta_id')->references('id')->on('consultas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('categoria_id')->references('id')->on('categorias')
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
        Schema::dropIfExists('archivos');
    }
}
