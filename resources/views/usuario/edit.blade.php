@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<h1>Edição de Usuarios</h1>
<br>
<form class="row g-3" action="/usuario/update/{{$usuario->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-7">
                  <label for="nome" class="form-label">Nome Completo</label>
                  <input type="text" class="form-control" id="nome" name="nome" value="{{$usuario->nome}}">
                </div> 
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="btn btn-finalizar" >Salvar Ediçao</button>
              </div>     
                </form>


@endsection