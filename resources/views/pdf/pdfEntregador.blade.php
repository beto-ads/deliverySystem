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
  <table>
    <caption>RELATÓRIO DE ENTREGADOR</caption>
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">Data de nascimento</th>
          <th scope="col">Sexo</th>
          <th scope="col">Estado civil</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone Celular</th>
          <th scope="col">Estado</th>
          <th scope="col">Cidade</th>
          <th scope="col">Endereço</th>
          <th scope="col">Numero</th>
          <th scope="col">Bairro</th>
          <th scope="col">Informações do Veiculo</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($entregadores as $entregador)
          <tr>
            <td>{{$entregador->nome}}</td>
            <td>{{$entregador->cpf}}</td>
            <td>{{$entregador->dataNascimento}}</td>
            <td>{{$entregador->sexo}}</td>
            <td>{{$entregador->estadoCivil}}</td>
            <td>{{$entregador->email}}</td>
            <td>{{$entregador->telefoneCelular}}</td>
            <td>{{$entregador->estado}}</td>
            <td>{{$entregador->cidade}}</td>
            <td>{{$entregador->endereco}}</td>
            <td>{{$entregador->numero}}</td>
            <td>{{$entregador->bairro}}</td>
            <td>{{$entregador->infoVeiculo}}</td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>