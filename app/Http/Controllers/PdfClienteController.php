<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade\PDF;

class PdfClienteController extends Controller
{
    public function geraPdf()
    {
        $clientes = Cliente::all();
        $pdf = PDF::loadView('pdf.pdfCliente', ["clientes" => $clientes]);
        return $pdf->download('relatorio de clientes.pdf');

        
    }
}
