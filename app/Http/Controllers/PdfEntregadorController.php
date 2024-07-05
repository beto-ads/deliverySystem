<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entregador;
use Barryvdh\DomPDF\Facade\PDF;

class PdfEntregadorController extends Controller
{
    public function geraPdf()
    {
        $entregadores = Entregador::all();
        $pdf = PDF::loadView('pdf.pdfEntregador', ["entregadores" => $entregadores])
                    ->setPaper('a4', 'landscape');
        return $pdf->download('relatorio de entregadores.pdf');

        
    }
}
