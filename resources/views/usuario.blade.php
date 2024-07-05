
@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')


<div class="div-btn">
  <div class="btn-cadastro">
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUsuario">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
  <a href="/usuario/geraPdf" class="btn btn-secondy">Gerar Relatório</a>
  </div>
</div>
<br>
  <div class="table-responsive">
    <table class=" table table-hover caption-top">
        <caption>Lista De usuarios Cadastrados</caption>
      <thead>
        <tr>
          <th scope="col">Nome Completo</th>
          
          <th scope="col">Opção</th>
        </tr>
      </thead>
      <tbody class="table-group-divider ">
        @foreach($usuarios as $usuario)

              <tr>
                <td >{{$usuario->nome}}</td>
                <td class = "acao">
                  <a href="/usuario/edit/{{$usuario->id}}" class="btn btn-info editar-btn m-1">Editar</a>
                  <form action="/usuario/delete/{{$usuario->id}}" method="get">
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
      <div class="modal fade modal-custom" id="modalUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Usuarios</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- modal de cadastro de fornecedor -->

              <form class="row g-3" action="/usuario/store" method="post">
                @csrf
                <div class="col-md-7">
                  <label for="nome" class="form-label">Nome Completo</label>
                  <input type="text" class="form-control" id="nome" name="nome">
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