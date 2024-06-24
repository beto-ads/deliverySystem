@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<form class="row g-3" action="/cliente/update/{{$cliente->id}}" method="post">
        @csrf
        @method('PUT')
          <div class="col-md-7">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome}}">
          </div>
          <div class="col-7">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$cliente->cpf}}" placeholder="somente numero">
          </div>
          <div class="col-md-7">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="{{$cliente->dataNascimento}}">
          </div>
          <div class="col-md-7">
                <label for="inputSexo" class="form-label">Sexo</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="masculino"
                        {{ old('sexo', $cliente->sexo) == 'masculino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="feminino"
                        {{ old('sexo', $cliente->sexo) == 'feminino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">feminino</label>
                </div>
            </div>

          <div class="col-md-7">
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select id="estadoCivil" class="form-select" name="estadoCivil" value="{{$cliente->estadoCivil}}">
              <option selected>Selecione...</option>
              <option>Solteiro</option>
              <option>Casado</option>
              <option>Divorciado</option>
              <option>Viúvo</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$cliente->email}}">
          </div>
          <div class="col-md-7">
            <label for="telefoneCelular" class="form-label">Telefone Celular</label>
            <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" value="{{$cliente->telefoneCelular}}">
          </div>
          <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" class="form-select" name="estado" value="{{$cliente->estado}}">
              <option selected>Selecione...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-7">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{$cliente->cidade}}">
          </div>
          <div class="col-md-8">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cliente->endereco}}">
          </div>
          <div class="col-md-8">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{$cliente->numero}}">
          </div>
          <div class="col-md-8">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
          </div>
        </form>

@endsection