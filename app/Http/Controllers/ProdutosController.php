<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use Illuminate\Database\Eloquent\SoftDeletes;

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
            echo "Sucesso! Produto cadastrado com sucesso!";
            return redirect()->route('produto.index');
        } else {
            echo "Erro! Não foi possível cadastrar o produto.";
        }

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
        dd($id);
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
    public function destroy(Request $request, $id)
    {
        $produto = Produtos::find($id);
        $produto->delete();
        
        return redirect()->route('produto.index');

        // Delete com JS e Ajax - o Retorno do delete com o find é 1, em regra, ou seja, 1 registro foi deletado
        // return response()->json(['success' => true]);
    }
}
