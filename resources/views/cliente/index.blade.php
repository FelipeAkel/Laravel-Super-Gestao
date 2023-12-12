@extends('layouts.template')

@section('titulo', 'Listar Clientes')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Listar Clientes</h1>
    </div>

    <h6>Filtros</h6>
    <form class="row" action="" method="GET">
        <div class="col-3">
            <input type="text" class="form-control" name="no_cliente" id="no_cliente" placeholder="Cliente">
        </div>
        <div class="col-2">
            <input type="number" class="form-control" name="nr_cep" id="nr_cep" 
                placeholder="CEP">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" name="ds_uf" id="ds_uf" 
                placeholder="UF">
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
        <div class="col-2">
            <a href="{{ route('cliente.create') }}" class="btn btn-light float-end">Novo Cliente</a>
        </div>
    </form>

    <hr>

    <h2>Resultado</h2>
        <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">CEP</th>
                    <th scope="col">UF</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

{{-- @dd($retornoCliente); --}}
                @forelse ($retornoCliente as $indice => $dadosCliente)
                    <tr>
                        <td>{{ $dadosCliente->id }}</td>
                        <td>{{ $dadosCliente->no_cliente }}</td>
                        <td>{{ $dadosCliente->nr_cep }}</td>
                        <td>{{ $dadosCliente->ds_uf }}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#eye-fill" />
                                </svg>
                            </button>
                            <a href="#" class="btn btn-primary btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#pencil-fill" />
                                </svg>
                            </a>
                         
                            {{-- <form id="form_excluir_{{$dadosCliente->id}}" action="{{ route('produto.delete', ['produto' => $dadosCliente->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="#" 
                                    onclick="document.getElementById('form_excluir_{{$dadosCliente->id}}').submit()"
                                    class="btn btn-danger btn-sm"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#x-circle-fill" />
                                    </svg>
                                </a>
                            </form> --}}

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" align="center" style="color: red" ><b>Não existe dados</b></td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection