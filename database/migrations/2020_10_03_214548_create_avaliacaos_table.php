<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('estrelas');
            $table->string('avaliacao', 200);
            $table->uuid('lote_id');
            $table->uuid('avaliador_id');
            $table->uuid('avaliado_id');
            $table->boolean('comprador');
            $table->boolean('vendedor');


            $table->foreign('lote_id')->references('id')->on('lotes');
            $table->foreign('avaliador_id')->references('id')->on('users');
            $table->foreign('avaliado_id')->references('id')->on('users');

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
        Schema::dropIfExists('avaliacoes');
    }
}
