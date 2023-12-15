<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_produto' => 'required | min:3',
            'vl_preco' => 'required | numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório!',
            'no_produto.min' => 'Campo deve ter no mínimo 3 caracteres!',
            'vl_preco.numeric' => 'O campo deve ser numérico!',
        ];
    }
}
