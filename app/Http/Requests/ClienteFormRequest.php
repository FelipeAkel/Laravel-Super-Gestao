<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'no_cliente' => 'required | max:100',
            'ds_email' => 'required | email | max:255',
            'nr_cep' => 'nullable | numeric | between:0,99999999',
            'ds_logradouro' => 'nullable | max:255',
            'ds_bairro' => 'nullable | max:255',
            'ds_cidade' => 'nullable | max:255',
            'ds_uf' => 'nullable | min:2 | max:2',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório!',
            'nullable' => 'O campo é opcional!',
            'numeric' => 'O campo deve ser numérico!',
            'no_cliente.max' => 'O máximo de caracteres é 100!',
            'ds_email.email' => 'O campo deve ser um e-mail válido',
            'ds_email.max' => 'O máximo de caracteres é 255!',
            'nr_cep.between' => 'O tamanho de 8 caracteres!',
            'ds_logradouro.max' => 'O máximo de caracteres é 255!',
            'ds_bairro.max' => 'O máximo de caracteres é 255!',
            'ds_cidade.max' => 'O máximo de caracteres é 255!',
            'ds_uf.max' => 'O máximo de caracteres é 2!',
            'ds_uf.min' => 'O mínimo de caracteres é 2!',
        ];
    }
}
