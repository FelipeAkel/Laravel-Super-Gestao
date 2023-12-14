<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_vendas', function (Blueprint $table) {
            $table->id()->comment('Chave Primária');
            $table->unsignedBigInteger('id_produto')->nullable(false)->comment('Chave Estrageira da tabela tb_produtos');
            $table->unsignedBigInteger('id_cliente')->nullable(false)->comment('Chave Estrageira da tabela tb_cliente');
            $table->timestamps();
            $table->softDeletes()->comment('Data de delete do registro');

            // Constraint
            $table->foreign('id_produto')->references('id')->on('tb_produtos');
            $table->foreign('id_cliente')->references('id')->on('tb_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_vendas');
    }
}
