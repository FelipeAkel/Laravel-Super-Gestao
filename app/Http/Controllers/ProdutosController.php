<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Http\Requests\ProdutoFormRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Brian2694\Toastr\Facades\Toastr;

class ProdutosController extends Controller
{

    public function __construct(Produtos $produtos){
        $this->produto = $produtos;
        // Basicamente, trata-se de: $retornoProdutos = Produtos::all();
    }

    public function index(Request $request)
    {
        $no_produto = $request->input('no_produto') ?? "";
        $vl_preco = $request->input('vl_preco') ?? null;
        
        $retornoProdutos = $this->produto->getProdutosIndex($no_produto, $vl_preco);

        return view('produtos.index', ['retornoProdutos' => $retornoProdutos]);
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(ProdutoFormRequest $request)
    {
        $retornoBanco = Produtos::create($request->all());

        if($retornoBanco == true){
            Toastr::success('Produto cadastrado no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível cadastrar o produto.', 'Erro!');
        }
        return redirect()->route('produto.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $retornoProduto = Produtos::find($id);

        return view('produtos.edit', ['retornoProduto' => $retornoProduto]);
    }

    public function update(ProdutoFormRequest $request, $id)
    {
        $produto = Produtos::find($id);
        $retornoBanco = $produto->update($request->all());

        if($retornoBanco == true){
            Toastr::success('Produto atualizados no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível atualizar o produto.', 'Erro!');
        }
        return redirect()->route('produto.index');
    }

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
