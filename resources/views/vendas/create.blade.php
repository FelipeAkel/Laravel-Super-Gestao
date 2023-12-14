@extends('layouts.template')

@section('titulo', 'Cadastrar Venda')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Venda</h1>
    </div>

    <form action="{{ route('venda.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="mb-3">
                <label for="id_produto" class="form-label"> Produto</label>
                <select class="form-control form-select {{ $errors->has('id_produto') ? 'is-invalid' : '' }}" name="id_produto" id="id_produto">
                    <option value=""> :: Selecione :: </option>
                    @foreach ($retornoProduto AS $indice => $dadosProduto)
                        <option value="{{ $dadosProduto->id }}" {{ old('id_produto') == $dadosProduto->id ? 'selected' : '' }} > R$: {{ number_format($dadosProduto->vl_preco, 2, ',', '.') }} ----- {{ $dadosProduto->no_produto  }} </option>
                    @endforeach
                </select>
                @if ($errors->has('id_produto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_produto') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="id_cliente" class="form-label"> Cliente</label>
                <select class="form-control form-select {{ $errors->has('id_cliente') ? 'is-invalid' : '' }}" name="id_cliente" id="id_cliente">
                    <option value=""> :: Selecione :: </option>
                    @foreach ($retornoCliete AS $indice => $dadosCliente)
                        <option value="{{ $dadosCliente->id }}" {{ old('id_cliente') == $dadosCliente->id ? 'selected' : '' }} > {{ $dadosCliente->no_cliente }} </option>
                    @endforeach
                </select>
                @if ($errors->has('id_cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_cliente') }}
                    </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-success ">
            Cadastrar Venda
        </button>
    </form>
@endsection
