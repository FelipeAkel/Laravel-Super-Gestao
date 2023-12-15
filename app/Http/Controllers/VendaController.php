<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produtos;
use App\Models\Cliente;
use App\Http\Requests\VendaFormRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprovanteVendaEmail;

class VendaController extends Controller
{
    public function index()
    {
        $retornoVendas = Venda::all();

        foreach($retornoVendas AS $indice => $dadosVenda){
            // Recuperando dados de Produto viculado ao ID
            $retornoProduto = Produtos::where('id', '=', $dadosVenda->id_produto)->first();
            // Verificando a existência do ID relacionado
            if(isset($retornoProduto)){
                $retornoVendas[$indice]['no_produto'] = $retornoProduto->no_produto;
                $retornoVendas[$indice]['vl_preco'] = $retornoProduto->vl_preco;
            }

            // Recuperando dados de Cliente viculado ao ID
            $retornoCliente = Cliente::where('id', '=', $dadosVenda->id_cliente)->first();
            if(isset($retornoCliente)){
                $retornoVendas[$indice]['no_cliente'] = $retornoCliente->no_cliente;
                $retornoVendas[$indice]['ds_email'] = $retornoCliente->ds_email;
            }
        }

        return view('vendas.index', compact('retornoVendas'));
    }

    public function create()
    {
        $retornoProduto = Produtos::all();
        $retornoCliete = Cliente::all();
        return view('vendas.create', compact('retornoProduto', 'retornoCliete'));
    }

    public function store(VendaFormRequest $request)
    {
        $retornoBanco = Venda::create($request->all());
        if($retornoBanco == true){
            Toastr::success('Venda cadastrada no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível cadastrar a venda.', 'Erro!');
        }
        return redirect()->route('venda.index');
    }

    public function enviarComprovanteVendaEmail($id){

        $retornoVenda = Venda::find($id);
        
        // Recuperando dados de um relacionamento
        $retornoProduto = Produtos::where('id', '=', $retornoVenda->id_produto)->first();
        $retornoVenda['no_produto'] = $retornoProduto->no_produto;

        $retornoCliente = Cliente::where('id', '=', $retornoVenda->id_cliente)->first();
        $retornoVenda['no_cliente'] = $retornoCliente->no_cliente;
        $retornoVenda['ds_email'] = $retornoCliente->ds_email;
        
        $parametrosEmail = [
            'nomeProduto' => $retornoVenda->no_produto,
            'nomeCliente' => $retornoVenda->no_cliente,
        ];

        // Destinário e a funcionalidade criada passando os parâmetros 
        Mail::to($retornoVenda->ds_email)->send(new ComprovanteVendaEmail($parametrosEmail));
        
        Toastr::success('E-mail enviado.', 'Sucesso!');
        return redirect()->route('venda.index');
    }
}
