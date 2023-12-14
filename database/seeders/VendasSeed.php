<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venda;

class VendasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venda::create([
            'id_produto' => 1,
            'id_cliente' => 2,
        ]);

        Venda::create([
            'id_produto' => 2,
            'id_cliente' => 3,
        ]);
    }
}
