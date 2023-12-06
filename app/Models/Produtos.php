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
}
