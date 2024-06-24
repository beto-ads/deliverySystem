<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrega;

use Illuminate\Support\Facades\DB;
class EntregaController extends Controller
{
    public function entrega(){
        
        $entregas = DB::table('entrega')
            ->join('pedido', 'pedido.id', '=', 'entrega.pedido_id')
            ->join('cliente', 'cliente.id', '=', 'entrega.cliente_id')
            ->join('entregador', 'entregador.identregador', '=', 'entrega.entregador_id')
            ->select([
               'entrega.*',
               'cliente.nome AS cliente_nome',
               'pedido.id AS cod_pedido',
               'entregador.nome AS entregador_nome',
            ])
            ->get();
    
       
        $clientes = DB::table('cliente')->select('id', 'nome')->get();
    
       
        $pedidos = DB::table('pedido')
        ->join('cliente', 'cliente.id', '=', 'pedido.cliente_id')
        ->select('pedido.id', 'cliente.nome as cliente_nome', 'cliente.id as cliente_id')
        ->get();
    
       
        $entregadores = DB::table('entregador')->select('identregador', 'nome')->get();
    
        
        return view('entrega', [
            'entregas' => $entregas,
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'entregadores' => $entregadores
        ]);
    }
    

   public function create(){

    return view('entrega', ['edit' => false]);
   }

   public function store(Request $request)
{
    try {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'cliente' => 'required|exists:cliente,id',
            'pedido' => 'required|exists:pedido,id',
            'entregador' => 'required|exists:entregador,identregador',
            'enderecoEntrega' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Inserção do pedido no banco de dados
        $entregaId = DB::table('entrega')->insertGetId([
            'cliente_id' => $validated['cliente'],
            'pedido_id' => $validated['pedido'],
            'entregador_id' => $validated['entregador'],
            'enderecoEntrega' => $validated['enderecoEntrega'],
            'status' => $validated['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/entrega')->with('success', 'Entrega cadastrada com sucesso!');
    } catch (\Throwable $th) {
        // Exibe o erro diretamente na página
        return back()->withErrors(['message' => $th->getMessage()]);
    }
}


   


   public function destroy($id){
        Entrega::findOrFail($id)->delete();

        return redirect('/entrega')->with('msg', 'Cadastro excluido com sucesso');
   }

   public function edit($id)
{
    $entrega = DB::table('entrega')->where('id', $id)->first();
    $clientes = DB::table('cliente')->get();
    $pedidos = DB::table('pedido')->get();
    $entregadores = DB::table('entregador')->get();

    return view('entrega.edit', compact('entrega', 'clientes', 'pedidos', 'entregadores'));
}


public function update(Request $request, $id) {
   

    $entrega = Entrega::findOrFail($id);
    $entrega->update($request->all());

   
    session()->flash('success', 'Registro editado com sucesso!');

    return redirect('/entrega');
}
}
