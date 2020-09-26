<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->uuid('id');
            $table->string('nome', 100);
            $table->string('sobrenome', 100);
            $table->string('email')->unique();
            $table->timestamp('data_confirmacao')->nullable();
            $table->string('password');
            $table->string('telefone', 50);
            $table->boolean('bloqueado')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
