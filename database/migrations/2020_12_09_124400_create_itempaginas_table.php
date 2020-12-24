<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItempaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itempaginas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pagina_id');
            $table->foreign('pagina_id')->references('id')->on('paginas');
            $table->string('slug')->nullable();
            $table->string('titulo');
            $table->string('capa')->nullable()->default('default.jpg');
            $table->text('texto');
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
        Schema::dropIfExists('itempaginas');
    }
}
