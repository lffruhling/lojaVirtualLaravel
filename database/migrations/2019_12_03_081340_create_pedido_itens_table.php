<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_itens', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pedido')->unsigned();
            $table->integer('produto')->unsigned();
            $table->integer('quantidade');
            $table->decimal('valor', 8,2);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produto')->references('id')->on('produtos');
            $table->foreign('pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_itens');
    }
}
