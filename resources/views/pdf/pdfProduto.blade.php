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
  <h1>RELATÓRIO DE PRODUTO</h1>
  <table>
    <thead>
      <tr>
        <th>Nome do Produto</th>
        <th>Categoria</th>
        <th>Quantidade</th>
        <th>Valor do Produto</th>
        <th>Descrição</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produtos as $produto)
      <tr>
        <td>{{ $produto->nomeProduto }}</td>
        <td>{{ $produto->categoria }}</td>
        <td>{{ $produto->quantidade }}</td>
        <td>{{ $produto->valorProduto }}</td>
        <td>{{ $produto->descricaoProduto }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

