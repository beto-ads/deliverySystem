@extends('layout.main')

@section('title', 'Editar Entrega')

@section('content')

<div class="container">
    <h1>Edição de Entregas</h1>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-3" action="/entrega/update/{{$entrega->id}}" method="post">
        @csrf
        @method('PUT')
        
        <div class="col-md-7">
            <label for="pedido" class="form-label">Pedido</label>
            <input type="text" class="form-control" id="pedido" name="pedido" value="{{ $entrega->pedido_id }}" readonly>
        </div>
        
        <div class="col-md-7">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $entrega->cliente_id }}" readonly>
        </div>

        <div class="col-md-7">
            <label for="entregador" class="form-label">Entregador</label>
            <select id="entregador" name="entregador" class="form-select" required>
                <option value="">Selecione...</option>
                @foreach ($entregadores as $entregador)
                    <option value="{{ $entregador->identregador }}" {{ $entregador->identregador == $entrega->entregador_id ? 'selected' : '' }}>
                        {{ $entregador->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-7">
            <label for="enderecoEntrega" class="form-label">Endereço de Entrega</label>
            <input type="text" class="form-control" id="enderecoEntrega" name="enderecoEntrega" value="{{ $entrega->enderecoEntrega }}">
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-finalizar">Atualizar Entrega</button>
        </div>
    </form>
</div>

@endsection
