@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')


<div class="div-btn">
  <div class="btn-cadastro">
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalFornecedor">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
    <button type="submit" class="btn btn-relatorio btn-secondary" >Gerar Relatório</button>
  </div>
</div>

<div class="table-responsive">
  <table class=" table table-hover caption-top">
      <caption>Lista De fornecedores Cadastrados</caption>
    <thead class="table-info">
      <tr>
        <th scope="col">Nome da empresa</th>
        <th scope="col">CNPJ</th>
        <th scope="col">Nome para contato </th>
        <th scope="col">Cargo do contato na empresa</th>
        <th scope="col">Endereço da empresa</th>
        <th scope="col">Telefone fixo</th>
        <th scope="col">Telefone celular</th>
        <th scope="col">Email</th>
        <th scope="col">Descrição do produto</th>
        <th scope="col">AÇÃO</thscope>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($fornecedores as $fornecedor)
        <tr>
          <td >{{$fornecedor->nomeEmpresa }}</td>
          <td>{{$fornecedor->cnpj}}</td>
          <td>{{$fornecedor->nomeContato}}</td>
          <td>{{$fornecedor->cargoContatoEmpresa}}</td>
          <td>{{$fornecedor->enderecoEmpresa}}</td>
          <td>{{$fornecedor->telefoneFixo}}</td>
          <td>{{$fornecedor->telefoneCelular}}</td>
          <td>{{$fornecedor->email}}</td>
          <td>{{$fornecedor->descricaoProduto}}</td>
          <td>
            <a href="/fornecedor/edit/{{$fornecedor->id}}" class="btn btn-info editar-btn">Editar</a>
            <form action="/fornecedor/delete/{{$fornecedor->id}}" method="get">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-danger excluir-btn">Excluir</button>
            </form>
          </td>
        </tr>
        
      @endforeach
    </tbody>
  </table> 
  <!-- bottao do modal --> 
</div>


@if(isset($edit) && $edit === true)

@else
<!-- modal de cadastro de fornecedor -->
<div class="modal fade" id="modalFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- modal de cadastro de fornecedor -->

        <form class="row g-3" action="/fornecedor/store" method="post">
          @csrf
          <div class="col-md-7">
            <label for="nomeEmpresa" class="form-label">Nome da empresa</label>
            <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa">
          </div>
          <div class="col-7">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="somente numeros">
          </div>
          <div class="col-md-7">
            <label for="nomeContato" class="form-label">Nome para contato</label>
            <input type="text" class="form-control" id="nomeContato" name="nomeContato">
          </div>
          <div class="col-md-7">
            <label for="cargoContatoEmpresa" class="form-label">Cargo do contato na empresa</label>
            <input type="text" class="form-control" id="cargoContatoEmpresa" name="cargoContatoEmpresa">
          </div>
          
          <div class="col-md-7">
            <label for="enderecoEmpresa" class="form-label">Endereço da empresa</label>
            <input type="text" class="form-control" id="enderecoEmpresa" name="enderecoEmpresa">
          </div>
          <div class="col-md-7">
            <label for="telefoneFixo" class="form-label">Telefone fixo</label>
            <input type="text" class="form-control" id="telefoneFixo" name="telefoneFixo">
          </div>
          <div class="col-md-8">
            <label for="telefoneCelular" class="form-label">Telefone celular</label>
            <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular">
          </div>
          <div class="col-md-8">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="col-md-8">
            <label for="descricaoProduto" class="form-label">Descrição do produto</label>
            <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto">
          </div>
          
          <div class="modal-footer">
            
            <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


@endsection