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
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalentrega">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
    <button type="submit" class="btn btn-relatorio btn-secondary">Gerar Relatório</button>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-hover caption-top">
      <caption>Entregas Cadastradas</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">Cod. Entrega</th>
        <th scope="col">Pedido</th>
        <th scope="col">Cliente</th>
        <th scope="col">Entregador</th>
        <th scope="col">Endereço de Entrega</th>
        <th scope="col">Status</th>
        <th scope="col">AÇÃO</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach ($entregas as $entrega)
        <tr>
          <td>{{$entrega->id}}</td>
          <td>{{$entrega->pedido_id}}</td>
          <td>{{$entrega->cliente_nome}}</td>
          <td>{{$entrega->entregador_nome}}</td>
          <td>{{$entrega->enderecoEntrega}}</td>
          <td>{{$entrega->status}}</td>
          <td>
            <a href="/entrega/edit/{{$entrega->id}}" class="btn btn-info editar-btn">Editar</a>
            <form action="/entrega/delete/{{$entrega->id}}" method="get">
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

@else
<div class="modal fade" id="modalentrega" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- modal de cadastro de entrega -->
                <form class="row g-3" action="/entrega/store" method="post">
                    @csrf
                    <div class="col-md-7">
                        <label for="pedido" class="form-label">Pedido</label>
                        <select id="pedido" name="pedido" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($pedidos as $pedido)
                                <option value="{{ $pedido->id }}" data-cliente-nome="{{ $pedido->cliente_nome }}" data-cliente-id="{{ $pedido->cliente_id }}">{{ $pedido->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" id="cliente" name="cliente_nome" class="form-control" readonly>
                        <input type="hidden" id="cliente_id" name="cliente">
                    </div>
                    <div class="col-md-7">
                        <label for="entregador" class="form-label">Entregador</label>
                        <select id="entregador_id" name="entregador" class="form-select" required>
                            <option value="">Selecione...</option>
                            @foreach ($entregadores as $entregador)
                                <option value="{{ $entregador->identregador }}">{{ $entregador->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7">
                        <label for="enderecoEntrega" class="form-label">Endereço de entrega</label>
                        <input type="text" class="form-control" id="enderecoEntrega" name="enderecoEntrega">
                    </div>
                    <div class="col-md-7">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-finalizar">Finalizar</button>
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

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#pedido').change(function() {
        var clienteNome = $(this).find('option:selected').data('cliente-nome');
        var clienteId = $(this).find('option:selected').data('cliente-id');
        $('#cliente').val(clienteNome);
        $('#cliente_id').val(clienteId);
    });
});
</script>
@endsection
