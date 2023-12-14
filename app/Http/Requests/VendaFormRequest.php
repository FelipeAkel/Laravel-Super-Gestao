<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_produto' => 'required | exists:tb_produtos,id',
            'id_cliente' => 'required | exists:tb_cliente,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigaório!',
            'exists' => 'O valor não consta no sistema. Não alterar os valores do select!',
        ];
    }
}
