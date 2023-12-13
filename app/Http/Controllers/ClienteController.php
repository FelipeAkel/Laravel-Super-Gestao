<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteFormRequest;
use Brian2694\Toastr\Facades\Toastr;

class ClienteController extends Controller
{

    public function __construct(Cliente $clientes)
    {
        $this->cliente = $clientes;
        // Basicamente, trata-se de: $retornoProdutos = Produtos::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no_cliente = $request->input('no_cliente') ?? '';
        $nr_cep = $request->input('nr_cep') ?? null;
        $ds_uf = $request->input('ds_uf') ?? '';

        $retornoCliente = $this->cliente->getConsultaIndex($no_cliente, $nr_cep, $ds_uf);
        return view('cliente.index', compact('retornoCliente'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cliente.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $retornoBanco = Cliente::create($request->all());

        if($retornoBanco == true){
            Toastr::success('Cliente cadastrado no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível cadastrar o cliente.', 'Erro!');
        }
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrayCliente = Cliente::find([$id])->toArray();
        return view('cliente.show', compact('arrayCliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retornoCliente = Cliente::find($id);
        return view ('cliente.edit', compact('retornoCliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $retornoCliente = Cliente::find($id);
        $retornoBanco = $retornoCliente->update($request->all());

        if($retornoBanco == true){
            Toastr::success('Cliente atualizado no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível atualizar o cliente.', 'Erro!');
        }
        return redirect()->route('cliente.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retornoCliente = Cliente::find($id);
        $retornoBanco = $retornoCliente->delete();

        if($retornoBanco == true){
            Toastr::success('Cliente excluído no sistema.', 'Sucesso!');
        } else {
            Toastr::error('Não foi possível excluir o cliente.', 'Erro!');
        }
        return redirect()->route('cliente.index');
    }
}
