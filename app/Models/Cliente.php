<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tb_cliente';

    protected $fillable = [
        'no_cliente',
        'nr_cep',
        'ds_logradouro',
        'ds_bairro',
        'ds_cidade',
        'ds_uf'
    ];

    public function getConsultaIndex(
        string $no_cliente = '', 
        int $nr_cep = null, 
        string $ds_uf = ''
    ){
        $retornoCliente = $this->where(function ($query) use ($no_cliente, $nr_cep, $ds_uf) {
            if($no_cliente){
                $query->where('no_cliente', 'LIKE', "%{$no_cliente}%");
            }
            if($nr_cep){
                $query->where('nr_cep', '=', $nr_cep);
            }
            if($ds_uf){
                $query->where('ds_uf', '=', $ds_uf);
            }
        })->get();

        return $retornoCliente;
    }
}

