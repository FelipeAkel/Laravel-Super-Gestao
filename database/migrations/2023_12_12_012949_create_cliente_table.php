<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->id();
            $table->string('no_cliente', 100)->comment('Nome do Cliente');
            $table->string('ds_email', 255)->comment('E-mail do Cliente');
            $table->integer('nr_cep')->nullable()->comment('Número do CEP');
            $table->string('ds_logradouro', 255)->nullable()->comment('Rua, Endereço do Cliente');
            $table->string('ds_bairro', 255)->nullable()->comment('Bairro do Endereço');
            $table->string('ds_cidade', 255)->nullable()->comment('Cidade do Endereço');
            $table->char('ds_uf', 2)->nullable()->comment('Unidade Federativa');
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
        Schema::dropIfExists('tb_cliente');
    }
}
