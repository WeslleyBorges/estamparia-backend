<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->string('status')->default(Status::PEDIDO_REALIZADO);

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
        Schema::dropIfExists('pedidos');
    }
};

abstract class Status
{
    const PEDIDO_REALIZADO = 'Pedido realizado';
    const PEDIDO_CONFIRMADO = 'Pedido confirmado';
    const PEDIDO_EM_CONFECCAO = 'Pedido em confecção';
    const PEDIDO_FINALIZADO = 'Pedido finalizado';
}
