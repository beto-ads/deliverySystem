<style>
  body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    line-height: 1.6;
  }

  .page {
    width: 100%;
    margin: 0 auto;
    padding: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  table, th, td {
    border: 1px solid #ddd;
  }

  th, td {
    padding: 8px;
    text-align: left;
  }
</style>
<div class="page">
  <table class="table table-hover caption-top">
    <caption>RELATÓRIO DE CLIENTES</caption>
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
        </tr>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>