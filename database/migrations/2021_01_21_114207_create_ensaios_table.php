<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsaiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensaios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cidadeuf');
            $table->enum('grau_escolaridade',['cursando','incompleto','completo']);
            $table->enum('escolaridade',['fundamental','medio','superior','posGraduacao','mestrado', 'doutorado']);
            $table->string('graduadoem')->nullable();
            $table->string('esporte')->nullable();
            $table->string('sonho')->nullable();
            $table->string('hobby')->nullable();
            $table->string('frase')->nullable();
            $table->string('musica')->nullable();
            $table->string('personalidade')->nullable();
            $table->string('prato')->nullable();
            $table->string('ensaio_id');
            $table->string('link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('ensaios');
    }
}
