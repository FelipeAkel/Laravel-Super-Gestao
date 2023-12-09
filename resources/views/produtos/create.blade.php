@extends('layouts.template')

@section('titulo', 'Cadastrar Produto')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Produto</h1>
    </div>

    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="no_produto" class="form-label">Nome Produto</label>
            <input type="text" class="form-control {{ $errors->has('no_produto') ? 'is-invalid' : '' }}" name="no_produto"
                id="no_produto" value="{{ old('no_produto') }}">
            @if ($errors->has('no_produto'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_produto') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="vl_preco" class="form-label">Preço R$: </label>
            <input type="number" class="form-control {{ $errors->has('vl_preco') ? 'is-invalid' : '' }}" name="vl_preco"
                id="vl_preco" min="0" step="0.01" value="{{ old('vl_preco') }}">
            @if ($errors->has('vl_preco'))
                <div class="invalid-feedback">
                    {{ $errors->first('vl_preco') }}
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>

@endsection
