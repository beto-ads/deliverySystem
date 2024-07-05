<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrega;
use Barryvdh\DomPDF\Facade\PDF;

class PdfEntregaController extends Controller
{
    public function geraPdf()
    {
        $entregas = Entrega::all();
        $pdf = PDF::loadView('pdf.pdfEntrega', ["entregas" => $entregas]);
        return $pdf->download('relatorio de entregas.pdf');

        
    }
}
