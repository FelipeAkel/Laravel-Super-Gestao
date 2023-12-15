{{-- Temos o mesmo formulário para o Cadastro/Atualização das informações utilizando o Component --}}

@if(isset($retornoCliente->id))
    <form action="{{ route('cliente.update', $retornoCliente->id) }}" method="POST">
        @csrf
        @method('PUT')
    @else
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
@endif

    <div class="row">
        <div class="mb-3">
            <label for="no_cliente" class="form-label"> Nome Cliente </label>
            <input type="text" class="form-control {{ $errors->has('no_cliente') ? 'is-invalid' : '' }}"
                name="no_cliente" id="no_cliente"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->no_cliente : old('no_cliente') }}">
            @if ($errors->has('no_cliente'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_cliente') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="ds_email" class="form-label"> E-mail </label>
            <input type="email" class="form-control {{ $errors->has('ds_email') ? 'is-invalid' : '' }}"
                name="ds_email" id="ds_email"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->ds_email : old('ds_email') }}">
            @if ($errors->has('ds_email'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_email') }}
                </div>
            @endif
        </div>
        <div class="mb-2">
            <label for="nr_cep"> CEP </label>
            <input type="text" maxlength="8" class="form-control {{ $errors->has('nr_cep') ? 'is-invalid' : '' }}"
                name="nr_cep" id="nr_cep"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->nr_cep : old('nr_cep') }}">
            <span id="helpBlock" class="help-block">Preencha o CEP e verifique o dados a seguir</span>
            <div class="invalid-feedback" id="retornoCepNaoEncontrado" style="display:none;">
            </div>
            @if ($errors->has('nr_cep'))
                <div class="invalid-feedback">
                    {{ $errors->first('nr_cep') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="ds_logradouro"> Endereço </label>
            <input type="text" class="form-control {{ $errors->has('ds_logradouro') ? 'is-invalid' : '' }}"
                name="ds_logradouro" id="ds_logradouro"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->ds_logradouro : old('ds_logradouro') }}">
            @if ($errors->has('ds_logradouro'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_logradouro') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="ds_bairro"> Bairro </label>
            <input type="text" class="form-control {{ $errors->has('ds_bairro') ? 'is-invalid' : '' }}"
                name="ds_bairro" id="ds_bairro"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->ds_bairro : old('ds_bairro') }}">
            @if ($errors->has('ds_bairro'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_bairro') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="ds_cidade"> Cidade </label>
            <input type="text" class="form-control {{ $errors->has('ds_cidade') ? 'is-invalid' : '' }}"
                name="ds_cidade" id="ds_cidade"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->ds_cidade : old('ds_cidade') }}">
            @if ($errors->has('ds_cidade'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_cidade') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="ds_uf"> UF </label>
            <input type="text" class="form-control {{ $errors->has('ds_uf') ? 'is-invalid' : '' }}" name="ds_uf"
                id="ds_uf" maxlength="2"
                value="{{ isset($retornoCliente->id) ? $retornoCliente->ds_uf : old('ds_uf') }}">
            @if ($errors->has('ds_uf'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_uf') }}
                </div>
            @endif
        </div>
    </div>
    <button type="submit" class="btn {{ isset($retornoCliente->id) ? 'btn-primary' : 'btn-success' }} ">
        {{ isset($retornoCliente->id) ? 'Atualizar' : 'Cadastrar' }} Cliente
    </button>
</form>
