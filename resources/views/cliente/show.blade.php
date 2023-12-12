@extends('layouts.template')

@section('titulo', 'Detalhes Cliente')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detalhes Cliente</h1>
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" width="20%" >Colunas</th>
                    <th scope="col" width="80%">Dados</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $arrayCliente[0]['id'] }}</td>
                </tr>
                <tr>
                    <td>Cliente</td>
                    <td>{{ $arrayCliente[0]['no_cliente'] }}</td>
                </tr>
                <tr>
                    <td>CEP</td>
                    <td>{{ $arrayCliente[0]['nr_cep'] }}</td>
                </tr>
                <tr>
                    <td>Endereço</td>
                    <td>{{ $arrayCliente[0]['ds_logradouro'] }}</td>
                </tr>
                <tr>
                    <td>Bairro</td>
                    <td>{{ $arrayCliente[0]['ds_bairro'] }}</td>
                </tr>
                <tr>
                    <td>Cidade</td>
                    <td>{{ $arrayCliente[0]['ds_cidade'] }}</td>
                </tr>
                <tr>
                    <td>UF</td>
                    <td>{{ $arrayCliente[0]['ds_uf'] }}</td>
                </tr>
                <tr>
                    <td>Data Criação</td>
                    <td>{{ $arrayCliente[0]['created_at'] }}</td>
                </tr>
                <tr>
                    <td>Data Atualização</td>
                    <td>{{ $arrayCliente[0]['updated_at'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection