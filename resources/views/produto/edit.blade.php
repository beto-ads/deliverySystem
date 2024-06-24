
@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<form class="row g-3" action="/produto/update/{{$produto->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-7">
                  <label for="nomeProduto" class="form-label">Nome do produto</label>
                  <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="{{$produto->nomeProduto}}">
                </div>
                <div class="col-7">
                  <label for="inputCpf" class="form-label">Categoria</label>
                  <input type="text" class="form-control" id="categoria" name="categoria" value="{{$produto->categoria}}">
                </div>
                <div class="col-md-7">
                  <label for="inputDate" class="form-label">Quantidade</label>
                  <input type="text" class="form-control" id="quantidade" name="quantidade" value="{{$produto->quantidade}}">
                </div>
                <div class="col-md-7">
                  <label for="inputCidade" class="form-label">Valor do produto</label>
                  <input type="text" class="form-control" id="valorProduto" name="valorProduto" value="{{$produto->valorProduto}}">
                </div>
                
                <div class="col-md-7">
                  <label for="inputCidade" class="form-label">Descrição</label>
                  <textarea name="descricaoProduto" id="descricaoProduto" cols="10" rows="3" class="form-control" value="{{$produto->descricaoProduto}}">
                  </textarea>
                </div> 
                <div class="modal-footer">
                  
                  <button type="submit" class="btn btn-primary" id="btn btn-finalizar" >Salvar Ediçao</button>
                </div>     
              </form>

@endsection