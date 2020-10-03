<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('titulo',100);
            $table->text('descricao');
            $table->string('nota_fiscal',100)->nullable();
            $table->string('justificativa_nao_envio_nota_fiscal',200)->nullable();
            $table->string('localidade',50);
            $table->unsignedBigInteger('numero')->nullable()->unique();
            $table->integer('tempo');

            $table->decimal('lance_inicial', 12, 2);
            $table->decimal('valor_incremento', 12, 2);
            $table->decimal('taxas', 12, 2)->nullable();
            $table->decimal('impostos', 12, 2)->nullable();

            $table->decimal('valor_envio', 12, 2)->nullable();
            $table->decimal('valor_leiloeiro', 12, 2)->nullable();

            $table->datetime('data_inicio')->nullable();
            $table->datetime('data_anuncio')->nullable();
            $table->datetime('data_encerramento')->nullable();
            $table->datetime('data_cancelamento')->nullable();

            $table->enum('tipo', ['DETERMINADO', 'INDETERMINADO']);
            $table->enum('status', ['PENDENTE','PROGRAMADO' ,  'REPROVADO', 'ATIVO', 'ENCERRADO', 'CANCELADO'])
                    ->default('PENDENTE');

            $table->timestamps();

            $table->uuid('proprietario_id');
            $table->uuid('vencedor_id')->nullable();
            $table->unsignedBigInteger('categoria_id');


            $table->foreign('proprietario_id')->references('id')->on('users');
            $table->foreign('vencedor_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
