<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produtos;
use App\Models\Cliente;
use App\Http\Requests\VendaFormRequest;
use Brian2694\Toastr\Facades\Toastr;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            }
        }

        return view('vendas.index', compact('retornoVendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $retornoProduto = Produtos::all();
        $retornoCliete = Cliente::all();
        return view('vendas.create', compact('retornoProduto', 'retornoCliete'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
