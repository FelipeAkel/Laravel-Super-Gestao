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

    public function index(Request $request)
    {
        $no_cliente = $request->input('no_cliente') ?? '';
        $nr_cep = $request->input('nr_cep') ?? null;
        $ds_uf = $request->input('ds_uf') ?? '';

        $retornoCliente = $this->cliente->getConsultaIndex($no_cliente, $nr_cep, $ds_uf);
        return view('cliente.index', compact('retornoCliente'));
    }
    
    public function create()
    {
        return view ('cliente.create');        
    }

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

    public function show($id)
    {
        $arrayCliente = Cliente::find([$id])->toArray();
        return view('cliente.show', compact('arrayCliente'));
    }

    public function edit($id)
    {
        $retornoCliente = Cliente::find($id);
        return view ('cliente.edit', compact('retornoCliente'));
    }

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
