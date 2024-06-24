<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function pedido(){
        $pedidos = DB::table('pedido')
            ->join('cliente', 'cliente.id', '=', 'pedido.cliente_id')
            ->join('produto', 'produto.id', '=', 'pedido.produto_id')
            ->join('usuario', 'usuario.id', '=', 'pedido.usuario_id')
            ->select([
               'pedido.*',
               'cliente.nome AS cliente_nome',
               'produto.nomeProduto AS produto_nome',
               'usuario.nome AS usuario_nome',
            ])
            ->get();
        $clientes = DB::table('cliente')->select('id', 'nome')->get();
        $produtos = DB::table('produto')->select('id', 'nomeProduto')->get();
        $usuarios = DB::table('usuario')->select('id', 'nome')->get();

        return view('pedido', [
        'pedidos' =>$pedidos,
        'clientes' =>$clientes,
        'produtos' =>$produtos,
        'usuarios' =>$usuarios 
        ]);
   }

   public function create(){

    return view('pedido', ['edit' => false]);
   }

  public function store(Request $request)
{
    try {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'cliente' => 'required|exists:cliente,id',
            'vendedor' => 'required|exists:usuario,id',
            'produto' => 'required|exists:produto,id',
            'quantidade' => 'required|string|max:255',
            'vUnitario' => 'required|string|max:255',
            'vTotal' => 'required|string|max:255',
        ]);

        // Inserção do pedido no banco de dados
        $pedidoId = DB::table('pedido')->insertGetId([
            'cliente_id' => $validated['cliente'],
            'usuario_id' => $validated['vendedor'],
            'produto_id' => $validated['produto'],
            'quantidade' => $validated['quantidade'],
            'vUnitario' => $validated['vUnitario'],
            'vTotal' => $validated['vTotal'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/pedido');
    } catch (\Throwable $th) {
        
    }
}


   public function destroy($id){
        Pedido::findOrFail($id)->delete();

        return redirect('/pedido')->with('msg', 'Cadastro excluido com sucesso');
   }

   public function edit($id)
{
    $pedido = DB::table('pedido')->where('id', $id)->first();
    $clientes = DB::table('cliente')->get();
    $produtos = DB::table('produto')->get();
    $usuarios = DB::table('usuario')->get();

    return view('pedido.edit', compact('pedido', 'clientes', 'produtos', 'usuarios'));
}


public function update(Request $request, $id) {
   

    $pedido = Pedido::findOrFail($id);
    $pedido->update($request->all());

   
    session()->flash('success', 'Registro editado com sucesso!');

    return redirect('/pedido');
}
}

