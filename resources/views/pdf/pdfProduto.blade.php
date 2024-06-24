@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

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
      <tbody class="table-group-divider">
        @foreach($produtos as $produto)
        
          <tr>
            <td >{{$produto->nomeProduto}}</td>
            <td>{{$produto->categoria}}</td>
            <td>{{$produto->quantidade}}</td>
            <td>{{$produto->valorProduto}}</td>
            <td>{{$produto->descricaoProduto}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>  

@endsection