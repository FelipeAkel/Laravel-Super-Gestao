@extends('layouts.template')

@section('titulo', 'Atualizar Produto')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atualizar Produto</h1>
    </div>

    @component('produtos._component.formCreateEdit', ['retornoProduto' => $retornoProduto])
    @endcomponent

@endsection
