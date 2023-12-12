<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Brian2694\Toastr\Facades\Toastr;

class ProdutosController extends Controller
{

    public function __construct(Produtos $produtos){
        $this->produto = $produtos;
        // Basicamente, trata-se de: $retornoProdutos = Produtos::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no_produto = $request->input('no_produto') ?? "";
        $vl_preco = $request->input('vl_preco') ?? null;
        
        $retornoProdutos = $this->produto->getProdutosIndex($no_produto, $vl_preco);

        return view('produtos.index', ['retornoProdutos' => $retornoProdutos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras_validacao = [
            'no_produto' => 'required | min:3',
            'vl_preco' => 'required | numeric',
        ];
        $msn_validacao = [
            'required' => 'O campo é obrigatório!',
            'no_produto.min' => 'Campo deve ter no mínimo 3 caracteres!',
            'vl_preco.numeric' => 'O campo deve ser numérico!',
        ];
        $request->validate($regras_validacao, $msn_validacao);

        $retornoBanco = Produtos::create($request->all());

        if($retornoBanco == true){
            Toastr::success('Produto cadastrado no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível cadastrar o produto.', 'Erro!');
        }
        return redirect()->route('produto.index');

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
        $retornoProduto = Produtos::find($id);

        return view('produtos.edit', ['retornoProduto' => $retornoProduto]);
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
        $regras_validacao = [
            'no_produto' => 'required | min:3',
            'vl_preco' => 'required | numeric',
        ];
        $msn_validacao = [
            'required' => 'O campo é obrigatório!',
            'no_produto.min' => 'Campo deve ter no mínimo 3 caracteres!',
            'vl_preco.numeric' => 'O campo deve ser numérico!',
        ];
        $request->validate($regras_validacao, $msn_validacao);

        $produto = Produtos::find($id);
        $retornoBanco = $produto->update($request->all());

        if($retornoBanco == true){
            Toastr::success('Produto atualizados no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível atualizar o produto.', 'Erro!');
        }
        return redirect()->route('produto.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $produto = Produtos::find($id);
        $retornoBanco = $produto->delete();

        if($retornoBanco == true){
            Toastr::success('Produto excluído no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível excluir o produto.', 'Erro!');
        }
        return redirect()->route('produto.index');


        // Delete com JS e Ajax - o Retorno do delete com o find é 1, em regra, ou seja, 1 registro foi deletado
        // return response()->json(['success' => true]);
    }
}
