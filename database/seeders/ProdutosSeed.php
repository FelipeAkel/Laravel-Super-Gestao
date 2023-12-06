<?php

namespace Database\Seeders;

use App\Models\Produtos;
use Illuminate\Database\Seeder;

class ProdutosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produtos::create([
            'no_produto' => 'Computador Game',
            'vl_preco' => '7000.50',
        ]);

        Produtos::create([
            'no_produto' => 'Caixa Chocolate Nestle',
            'vl_preco' => '11.99',
        ]);

        Produtos::create([
            'no_produto' => 'Energético Monster',
            'vl_preco' => '7.89',
        ]);

        Produtos::create([
            'no_produto' => 'Arroz 1kg',
            'vl_preco' => '6.50',
        ]);

        Produtos::create([
            'no_produto' => 'Câmera Fotográfica',
            'vl_preco' => '2250.50',
        ]);
    }
}
