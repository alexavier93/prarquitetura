<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetoImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projeto_id');
            $table->string('imagem');
            $table->string('thumbnail');

            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto_imagens');
    }
}
