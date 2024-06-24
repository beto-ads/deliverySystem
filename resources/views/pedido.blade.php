@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')


<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="div-btn">
  <div class="btn-cadastro">
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPedido">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
    <button type="submit" class="btn btn-relatorio btn-secondary" >Gerar Relatório</button>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-hover caption-top">
      <caption>Pedidos Cadastrados</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">N* Pedido</th>
        <th scope="col">Cliente</th>
        <th scope="col">Produto</th>
        <th scope="col">Vendedor</th>
        <th scope="col">Quantidade</th>
        <th scope="col">V.unitario</th>
        <th scope="col">V. Total</th>
        <th scope="col">AÇÃO</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach ($pedidos as $pedido)
        <tr>
          <td>{{$pedido->id}}</td>
          <td>{{$pedido->cliente_nome}}</td>
          <td>{{$pedido->produto_nome}}</td>
          <td>{{$pedido->usuario_nome}}</td>
          <td>{{$pedido->quantidade}}</td>
          <td>{{$pedido->vUnitario}}</td>
          <td>{{$pedido->vTotal}}</td>
          <td>
            <a href="/pedido/edit/{{$pedido->id}}" class="btn btn-info editar-btn">Editar</a>
            <form action="/pedido/delete/{{$pedido->id}}" method="get">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-danger excluir-btn">Excluir</button>
            </form>
          </td>
        </tr>
        </tr>
    @endforeach 
    </tbody>
  </table>
</div>

@if(isset($edit) && $edit === true)

@else

<div class="modal fade" id="modalPedido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Pedido</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- modal de cadastro de fornecedor -->
          <form class="row g-3" action="/pedido/store" method="post">
            @csrf
            <div class="col-md-7">
                        <label for="cliente" class="form-label">Cliente</label>
                        <select id="cliente" name="cliente" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7">
                        <label for="produto" class="form-label">Produto</label>
                        <select id="produto" name="produto" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nomeProduto }}</option>
                            @endforeach
                        </select>
                    </div>

            <div class="col-md-7">
              <label for="quantidade" class="form-label">Quantidade</label>
              <input type="number" class="form-control" id="quantidade" name="quantidade" >
            </div>
            <div class="col-md-7">
                        <label for="vendedor" class="form-label">Vendedor</label>
                        <select id="vendedor" name="vendedor" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="col-md-7">
              <label for="vUnitario" class="form-label">V.unitario</label>
              <input type="text" class="form-control" id="vUnitario" name="vUnitario" placeholder="valor por produto">
            </div>
            <div class="col-md-7">
              <label for="vTotal" class="form-label">V.Total</label>
              <input type="text" class="form-control" id="vTotal" name="vTotal" placeholder="valor final para venda">
            </div>
            
            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
            </div>     
          </form>
        
      </di>
    </div>
  </div>
  @endif
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@endsection