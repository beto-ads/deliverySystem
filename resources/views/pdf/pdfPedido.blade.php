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
    <caption>RELATÓRIO DE PEDIDO</caption>
      <thead>
        <tr>
          <th scope="col">N* Pedido</th>
          <th scope="col">Cliente</th>
          <th scope="col">Produto</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Quantidade</th>
          <th scope="col">V.unitario</th>
          <th scope="col">V. Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pedidos as $pedido)
        <tr>
          <td>{{$pedido->id}}</td>
          <td>{{$pedido->cliente_nome}}</td>
          <td>{{$pedido->produto_nome}}</td>
          <td>{{$pedido->usuario_nome}}</td>
          <td>{{$pedido->quantidade}}</td>
          <td>{{$pedido->vUnitario}}</td>
          <td>{{$pedido->vTotal}}</td> 
        </tr>
        @endforeach 
      </tbody>
  </table>
</div>