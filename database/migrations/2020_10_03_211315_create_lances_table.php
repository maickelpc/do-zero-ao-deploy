<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lances', function (Blueprint $table) {
            
            $table->id();
            $table->uuid('user_id');
            $table->uuid('lote_id');
            $table->decimal('lance', 12,2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lote_id')->references('id')->on('lotes');

        });


        Schema::create('usuario_lote_interessados', function (Blueprint $table) {
            
            $table->uuid('user_id');
            $table->uuid('lote_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lote_id')->references('id')->on('lotes');

            $table->unique(['user_id', 'lote_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lances');

        Schema::dropIfExists('usuario_lote_interessados');
    }
}
