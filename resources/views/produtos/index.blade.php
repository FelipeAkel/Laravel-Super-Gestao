@extends('layouts.template')

@section('titulo', 'Listar Produtos')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Listar Produtos</h1>
    </div>

    <h6>Filtros</h6>
    <form class="row" action="{{ route('produto.index') }}" method="GET">
        <div class="col-3">
            <input type="text" class="form-control" name="no_produto" id="no_produto" placeholder="Produto">
        </div>
        <div class="col-2">
            <input type="number" class="form-control" name="vl_preco" id="vl_preco" min="0" step="0.01"
                placeholder="Preço Maior que">
        </div>
        <div class="col-5">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
        <div class="col-2">
            <a href="{{ route('produto.create') }}" class="btn btn-light float-end">Novo Produto</a>
        </div>
    </form>

    <hr>

    <h2>Resultado</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Data Criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($retornoProdutos as $indice => $dadosProduto)
                    <tr>
                        <td>{{ $dadosProduto->id }}</td>
                        <td>{{ $dadosProduto->no_produto }}</td>
                        <td>R$: {{ number_format($dadosProduto->vl_preco, 2, ',', '.') }}</td>
                        <td>{{ date_format($dadosProduto->created_at, 'd/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('produto.edit', ['produto' => $dadosProduto->id]) }}" class="btn btn-primary btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#pencil-fill" />
                                </svg>
                            </a>
                            {{-- Deletado registro com auxilio de JS e Ajax - super-gestao.js 
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <a onclick="deleteProduto('{{route('produto.delete')}}', {{$dadosProduto->id}})" class="btn btn-danger btn-sm">
                            --}}
                            <form id="form_excluir_{{$dadosProduto->id}}" action="{{ route('produto.delete', ['produto' => $dadosProduto->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="#" 
                                    onclick="document.getElementById('form_excluir_{{$dadosProduto->id}}').submit()"
                                    class="btn btn-danger btn-sm"
                                >
                                    <svg class="bi">
                                        <use xlink:href="#x-circle-fill" />
                                    </svg>
                                </a>
                            </form>

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
