@extends('layouts.template')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>

    <form class="row" action="" method="GET">
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
            <a type="button" class="btn btn-light float-end">Novo Produto</a>
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
                    <th scope="col">Data Exclusão</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retornoProdutos as $indice => $dadosProduto)
                    <tr>
                        <td>{{ $dadosProduto->id }}</td>
                        <td>{{ $dadosProduto->no_produto }}</td>
                        <td>R$: {{ number_format($dadosProduto->vl_preco, 2, ',', '.') }}</td>
                        <td>{{ date_format($dadosProduto->created_at, 'd/m/Y H:i') }}</td>
                        <td>
                            @empty(!$dadosProduto->deleted_at)
                                @php
                                    $deleted_at = new DateTimeImmutable($dadosProduto->deleted_at);
                                    echo $deleted_at->format('d/m/Y H:i');
                                @endphp
                            @endempty
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#eye-fill" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-primary btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#pencil-fill" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                                <svg class="bi">
                                    <use xlink:href="#x-circle-fill" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
