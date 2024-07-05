
@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')


<div class="div-btn">
  <div class="btn-cadastro">
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProduto">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
  <a href="/produto/geraPdf" class="btn btn-secondy">Gerar Relatório</a>

  </div>
</div>
<br>
  <div class="table-responsive">
    <table class=" table table-hover caption-top">
        <caption>Lista De Produtos Cadastrados</caption>
      <thead>
        <tr>
          <th scope="col">Nome do produto</th>
          <th scope="col">Categoria</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Valor do produto</th>
          <th scope="col">Descrição do Produto</th>
          <th scope="col">Opção</th>
        
        </tr>
      </thead>
      <tbody class="table-group-divider ">
        @foreach($produtos as $produto)

        <tr>
        <td >{{$produto->nomeProduto}}</td>
        <td>{{$produto->categoria}}</td>
        <td>{{$produto->quantidade}}</td>
        <td>R$ {{$produto->valorProduto}}</td>
        <td>{{$produto->descricaoProduto}}</td>
        <td>
        <a href="/produto/edit/{{$produto->id}}" class="btn btn-info editar-btn m-1">Editar</a>
        <form action="/produto/delete/{{$produto->id}}" method="get">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-danger excluir-btn">Excluir</button>
        </form>
        </td>
        </tr>
    @endforeach
      </tbody>
    </table>  
  </div>

  @if(isset($edit) && $edit === true)
  <!-- Formulário de edição -->
  <!-- modal de ediçao-->

@else


    <!-- Formulário de criação -->
     <!-- Modal de cadastro-->
    <div class="modal fade modal-custom" id="modalProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
    <div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Produto</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <!-- modal de cadastro de fornecedor -->

    <form class="row g-3" action="/produto/store" method="post">
    @csrf
    <div class="col-md-7">
      <label for="nomeProduto" class="form-label">Nome do produto</label>
      <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" aria-describedby="nomeProdutoFeedback" required>
      <div id="nomeProdutoFeedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
    </div>
    <div class="col-7">
      <label for="inputCpf" class="form-label">Categoria</label>
      <input type="text" class="form-control" id="categoria" name="categoria" placeholder="tipo de animal" aria-describedby="categoriaFeedback" required>
      <div id="categoriaFeedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
    </div>
    <div class="col-md-7">
      <label for="inputDate" class="form-label">Quantidade</label>
      <input type="text" class="form-control" id="quantidade" name="quantidade" aria-describedby="quantidadeFeedback" required>
      <div id="quantidadeFeedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
    </div>
    <div class="col-md-7">
      <label for="inputCidade" class="form-label">Valor do produto</label>
      <input type="text" class="form-control" id="valorProduto" name="valorProduto" placeholder="valor final para venda" aria-describedby="valorProdutoFeedback" required>
      <div id="valorProdutoFeedback" class="invalid-feedback">
      Please provide a valid city.
    </div>
    </div>

    <div class="col-md-7">
      <label for="inputCidade" class="form-label">Descrição</label>
      <textarea name="descricaoProduto" id="descricaoProduto" cols="10" rows="3" class="form-control" placeholder="Descrição do produto" aria-describedby="descricaoProdutoFeedback" required>
      </textarea>
      <div id="descricaoProdutoFeedback" class="invalid-feedback">
      Por favor, insira uma mensagem na área de texto.
    </div>
    </div> 
    <div class="modal-footer">

      <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
    </div>     
    </form>

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