<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'tb_produtos';
    protected $fillable = [
        'no_produto',
        'vl_preco',
    ];

    public function getProdutosIndex(
        string $no_produto = '',
        int $vl_preco = null
    )
    {
        $retornoProduto = $this->where(function ($query) use ($no_produto, $vl_preco) {
            if($no_produto) {
                $query->where('no_produto', 'LIKE', "%{$no_produto}%");
            }
            if($vl_preco) {
                $query->where('vl_preco', '>=', $vl_preco);
            }
        })->get();

        return $retornoProduto;
    }
}
