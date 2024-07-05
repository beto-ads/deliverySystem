@extends('layout.main')

@section('title', 'S.S delivery')

@section('content')

<div class="div-btn">
  <div class="btn-cadastro">
    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCliente">
      + Cadastro
    </button>
  </div>
  <div class="btn-relator">
    <a href="/cliente/geraPdf" class="btn btn-secondy">Gerar Relatório</a>
  </div>
</div>

<br>

<div class="table-responsive">
  <table class="table table-hover caption-top">
      <caption>Clientes Cadastrados</caption>
    <thead class="table-light">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Sexo</th>
        <th scope="col">Estado Civil</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone Celular</th>
        <th scope="col">Estado</th>
        <th scope="col">Cidade</th>
        <th scope="col">Endereço</th>
        <th scope="col">Numero</th>
        <th scope="col">Bairro</th>
        <th scope="col">Opção</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach ($clientes as $cliente)
        <tr>
          <td>{{$cliente->nome}}</td>
          <td>{{$cliente->cpf}}</td>
          <td>{{$cliente->dataNascimento}}</td>
          <td>{{$cliente->sexo}}</td>
          <td>{{$cliente->estadoCivil}}</td>
          <td>{{$cliente->email}}</td>
          <td>{{$cliente->telefoneCelular}}</td>
          <td>{{$cliente->estado}}</td>
          <td>{{$cliente->cidade}}</td>
          <td>{{$cliente->endereco}}</td>
          <td>{{$cliente->numero}}</td>
          <td>{{$cliente->bairro}}</td>
          <td>
            <a href="/cliente/edit/{{$cliente->id}}" class="btn btn-primary editar-btn m-1">Editar</a>
            <form action="/cliente/delete/{{$cliente->id}}" method="get">
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



<!-- Modal -->
@if(isset($edit) && $edit === true)

@else
<!-- Modal -->
<div class="modal fade modal-custom" id="modalCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro de Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- modal de cadastro de cliente -->
        <form class="row g-3" action="/cliente/store" method="post">
          @csrf
          <div class="col-md-7">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="col-7">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="somente numeros">
          </div>
          <div class="col-md-7">
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
          </div>
          <div class="col-md-7">
            <label for="inputSexo" class="form-label">Sexo</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="masculino">
                <label class="form-check-label" for="flexRadioDefault1">masculino</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="feminino" checked>
                <label class="form-check-label" for="flexRadioDefault2">feminino</label>
              </div>
          </div>
          <div class="col-md-7">
            <label for="estadoCivil" class="form-label">Estado Civil</label>
            <select id="estadoCivil" class="form-select" name="estadoCivil">
              <option selected>Selecione...</option>
              <option>Solteiro</option>
              <option>Casado</option>
              <option>Divorciado</option>
              <option>Viúvo</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="col-md-7">
            <label for="telefoneCelular" class="form-label">Telefone Celular</label>
            <input type="text" class="form-control" id="telefoneCelular" name="telefoneCelular">
          </div>
          <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
            <select id="estado" class="form-select" name="estado">
              <option selected>Selecione...</option>
              <option>Paraná</option>
            </select>
          </div>
          <div class="col-md-7">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade">
          </div>
          <div class="col-md-8">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco">
          </div>
          <div class="col-md-8">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero">
          </div>
          <div class="col-md-8">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro">
          </div> 
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn btn-finalizar">Finalizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</di>

@endif
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

       
@endsection