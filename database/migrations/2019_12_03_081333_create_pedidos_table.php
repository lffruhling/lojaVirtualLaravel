<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->integer('tipo_pagamento')->unsigned();
            $table->integer('status')->unsigned();

            $table->decimal('desconto', 5, 2);
            $table->integer('parcelas');

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('tipo_pagamento')->references('id')->on('tipo_pagamentos');
            $table->foreign('status')->references('id')->on('pedido_status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
