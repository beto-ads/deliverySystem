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
    <caption>RELATÓRIO DE FORNECEDOR</caption>
      <thead class="">
        <tr>
          <th scope="col">Nome da empresa</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Nome para contato </th>
          <th scope="col">Cargo do contato na empresa</th>
          <th scope="col">Endereço da empresa</th>
          <th scope="col">Telefone fixo</th>
          <th scope="col">Telefone celular</th>
          <th scope="col">Email</th>
          <th scope="col">Descrição do produto fornecido</th>
        </tr>
      </thead>
      <tbody>
        @foreach($fornecedores as $fornecedor)
        <tr>
          <td >{{$fornecedor->nomeEmpresa }}</td>
          <td>{{$fornecedor->cnpj}}</td>
          <td>{{$fornecedor->nomeContato}}</td>
          <td>{{$fornecedor->cargoContatoEmpresa}}</td>
          <td>{{$fornecedor->enderecoEmpresa}}</td>
          <td>{{$fornecedor->telefoneFixo}}</td>
          <td>{{$fornecedor->telefoneCelular}}</td>
          <td>{{$fornecedor->email}}</td>
          <td>{{$fornecedor->descricaoProduto}}</td> 
        </tr>
        @endforeach
      </tbody>
  </table>
</div>