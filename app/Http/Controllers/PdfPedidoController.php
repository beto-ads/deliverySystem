<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class PdfPedidoController extends Controller
{
    public function geraPdf()
    {
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
        $pdf = PDF::loadView('pdf.pdfPedido', ["pedidos" => $pedidos]);
        return $pdf->download('relatorio de pedidos.pdf');

        
    }
}
