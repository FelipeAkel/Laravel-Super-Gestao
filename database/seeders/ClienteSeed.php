<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'no_cliente' => 'Felipe Akel',
            'ds_email' => 'felipe.akel01@gmail.com',
            'nr_cep' => '70650480',
            'ds_logradouro' => 'SHCES Quadra 407 Área Especial',
            'ds_bairro' => 'Cruzeiro Novo',
            'ds_cidade' => 'Brasília',
            'ds_uf' => 'DF',
        ]);

        Cliente::create([
            'no_cliente' => 'Sakura Uchira',
            'ds_email' => 'pokemesh.akel@gmail.com',
            'nr_cep' => '70650480',
            'ds_logradouro' => 'SHCES Quadra 407 Área Especial',
            'ds_bairro' => 'Cruzeiro Novo',
            'ds_cidade' => 'Brasília',
            'ds_uf' => 'DF',
        ]);

        Cliente::create([
            'no_cliente' => 'Naruto Uzumaki',
            'ds_email' => 'naruto@gmail.com',
            'nr_cep' => '70650480',
            'ds_logradouro' => 'SHCES Quadra 407 Área Especial',
            'ds_bairro' => 'Cruzeiro Novo',
            'ds_cidade' => 'Brasília',
            'ds_uf' => 'DF',
        ]);

    }
}
