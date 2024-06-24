@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<form class="row g-3" action="/entregador/update/{{$entregador->id}}" method="post">
        @csrf
        @method('PUT')
          <div class="col-md-7">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$entregador->nome}}">
          </div>
          <div class="col-7">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$entregador->cpf}}" placeholder="somente numero">
          </div>
          <div class="col-md-7">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="{{$entregador->dataNascimento}}">
          </div>
          <div class="col-md-7">
                <label for="inputSexo" class="form-label">Sexo</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="masculino"
                        {{ old('sexo', $entregador->sexo) == 'masculino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="feminino"
                        {{ old('sexo', $entregador->sexo) == 'feminino' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">feminino</label>
                </div>
            </div>

          <div class="col-md-7">
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select id="estadoCivil" class="form-select" name="estadoCivil" value="{{$entregador->estadoCivil}}">
              <option selected>Selecione...</option>
              <option>Solteiro</option>
              <option>Casado</option>
              <option>Divorciado</option>
              <option>Viúvo</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$entregador->email}}">
          </div>
          <div class="col-md-7">
            <label for="telefoneCelular" class="form-label">Telefone Celular</label>
            <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" value="{{$entregador->telefoneCelular}}">
          </div>
          <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" class="form-select" name="estado" value="{{$entregador->estado}}">
              <option selected>Selecione...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-7">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{$entregador->cidade}}">
          </div>
          <div class="col-md-8">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{$entregador->endereco}}">
          </div>
          <div class="col-md-8">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" value="{{$entregador->numero}}">
          </div>
          <div class="col-md-8">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$entregador->bairro}}">
          </div>
          <div class="form-floating col-md-7">
            <textarea class="form-control" placeholder="Leave a comment here" id="infoVeiculo" name="infoVeiculo" value="{{$entregador->infoVeiculo}}" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Informações do veículo</label>
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
          </div>
        </form>

@endsection