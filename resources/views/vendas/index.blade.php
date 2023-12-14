@extends('layouts.template')

@section('titulo', 'Listar Vendas')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Listar Vendas</h1>
    </div>

    <a href="{{ route('venda.create') }}" class="btn btn-light float-end">Nova Venda</a>

    <h2>Resultado</h2>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($retornoVendas as $indice => $dadosVenda)
                    <tr>
                        <td>{{ $dadosVenda->id }}</td>
                        <td>{{ $dadosVenda->no_cliente }}</td>
                        <td>{{ $dadosVenda->no_produto }}</td>
                        <td>R${{ number_format($dadosVenda->vl_preco, 2, ',', '.') }}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm">
                                Enviar Email
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center" style="color: red"><b>Não existe dados</b></td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
