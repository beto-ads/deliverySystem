@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<form class="row g-3" action="/fornecedor/update/{{$fornecedor->id}}" method="post">
        @csrf
        @method('PUT')
          <div class="col-md-7">
            <label for="nomeEmpresa" class="form-label">Nome da empresa</label>
            <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="{{$fornecedor->nomeEmpresa}}">
          </div>
          <div class="col-7">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{$fornecedor->cnpj}}">
          </div>
          <div class="col-md-7">
            <label for="nomeContato" class="form-label">Nome para contato</label>
            <input type="text" class="form-control" id="nomeContato" name="nomeContato" value="{{$fornecedor->nomeContato}}">
          </div>
          <div class="col-md-7">
            <label for="cargoContatoEmpresa" class="form-label">Cargo do contato na empresa</label>
            <input type="text" class="form-control" id="cargoContatoEmpresa" name="cargoContatoEmpresa" value="{{$fornecedor->cargoContatoEmpresa}}">
          </div>
          
          <div class="col-md-7">
            <label for="enderecoEmpresa" class="form-label">Endereço da empresa</label>
            <input type="text" class="form-control" id="enderecoEmpresa" name="enderecoEmpresa" value="{{$fornecedor->enderecoEmpresa}}">
          </div>
          <div class="col-md-7">
            <label for="telefoneFixo" class="form-label">Telefone fixo</label>
            <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo" value="{{$fornecedor->telefoneFixo}}">
          </div>
          <div class="col-md-8">
            <label for="telefoneCelular" class="form-label">Telefone celular</label>
            <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular" value="{{$fornecedor->telefoneCelular}}">
          </div>
          <div class="col-md-8">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$fornecedor->email}}">
          </div>
          <div class="col-md-8">
            <label for="descricaoProduto" class="form-label">Descrição do produto</label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" value="{{$fornecedor->descricaoProduto}}">
          </div>
          <div class="modal-footer">  
            <button type="submit" class="btn btn-primary" id="btn btn-finalizar" >Salvar Ediçao</button>
          </div> 
        </form>

@endsection