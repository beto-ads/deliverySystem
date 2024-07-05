@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')
<div class="container mt-5">
    <h1>Edição de Pedidos</h1>
    <br>

    <form class="row g-3" action="/pedido/update/{{$pedido->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-7">
        <label for="cliente" class="form-label">Cliente</label>
        <select id="cliente_id" name="cliente_id" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-7">
        <label for="produto" class="form-label">Produto</label>
        <select id="produto_id" name="produto_id" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}" {{ $pedido->produto_id == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nomeProduto }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-7">
        <label for="vendedor" class="form-label">Vendedor</label>
        <select id="usuario_id" name="usuario_id" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $pedido->usuario_id == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->nome }}
                </option>
            @endforeach
        </select>
    </div>
        <div class="col-md-7">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $pedido->quantidade }}" required>
        </div>
        <div class="modal-footer">                  
          <button type="submit" class="btn btn-primary" id="btn btn-finalizar" >Salvar Ediçao</button>
        </div> 
    </form>
</div>
@endsection
