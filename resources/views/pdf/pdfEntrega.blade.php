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
    <caption>RELATÓRIO DE ENTREGAS</caption><br>
      <thead class="table-light">
        <tr>
          <th scope="col">Cod. Entrega</th>
          <th scope="col">Pedido</th>
          <th scope="col">Cliente</th>
          <th scope="col">Entregador</th>
          <th scope="col">Endereço de Entrega</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($entregas as $entrega)
          <tr>
            <td>{{$entrega->id}}</td>
            <td>{{$entrega->pedido_id}}</td>
            <td>{{$entrega->cliente_nome}}</td>
            <td>{{$entrega->entregador_nome}}</td>
            <td>{{$entrega->enderecoEntrega}}</td>
            <td>{{$entrega->status}}</td>
          </tr>
        @endforeach 
      </tbody>
  </table>
</div>