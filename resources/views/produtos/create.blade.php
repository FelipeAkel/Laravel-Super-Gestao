@extends('layouts.template')

@section('titulo', 'Cadastrar Produto')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Produto</h1>
    </div>

    @component('produtos._component.formCreateEdit')
    @endcomponent

@endsection
