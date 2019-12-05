<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('categoria')->unsigned();
            $table->string('nome')->unique();
            $table->string('imagem');
            $table->float('preco');
            $table->text('descricao');
            $table->integer('estoque')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
