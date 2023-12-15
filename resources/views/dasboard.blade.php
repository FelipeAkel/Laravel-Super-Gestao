@extends('layouts.template')

@section('titulo', 'Dasboard')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-4 mb-4 text-center">
        <div class="col">
            <div class="card mb-3 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Vendas</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ $arrayDasboard['totalVendas'] }}</h1>
                    <ul class="list-unstyled mt-3 mb-3">
                        <li>Total</li>
                    </ul>
                    <a href="{{ route('venda.index') }}" class="w-100 btn btn-lg btn-outline-primary">Acessar página</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Produtos</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ $arrayDasboard['totalProdutos'] }}</h1>
                    <ul class="list-unstyled mt-3 mb-3">
                        <li>Total</li>
                    </ul>
                    <a href="{{ route('produto.index') }}" class="w-100 btn btn-lg btn-outline-primary">Acessar página</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Clientes</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{ $arrayDasboard['totalClientes'] }}</h1>
                    <ul class="list-unstyled mt-3 mb-3">
                        <li>Total</li>
                    </ul>
                    <a href="{{ route('cliente.index') }}" class="w-100 btn btn-lg btn-outline-primary">Acessar página</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Usuários</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">29</h1>
                    <ul class="list-unstyled mt-3 mb-3">
                        <li>Total</li>
                    </ul>
                    <a href="#" class="w-100 btn btn-lg btn-outline-primary">Acessar página</a>
                </div>
            </div>
        </div>
    </div>

    <hr>
    
    <h2>Gráfico Exemplo</h2>
    <canvas class="my-4 w-100" id="myChart" width="900" height="180"></canvas>

@endsection
