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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Request $request)
    {
        $produto = Produtos::find($request->id);
        $produto->delete();
        
        // dd($retornoBanco);

        // if($retornoBanco){

        // }

        return response()->json(['success' => true]);
        // dd('destroyyy');
    }
}
