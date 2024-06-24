<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\PDF;


class PdfController extends Controller
{
    public function geraPdf()
    {
        $produtos = Produto::all();
        $pdf = PDF::loadView('pdf.pdfProduto', compact('produtos'));
        return $pdf->download('relatorio_produtos.pdf');
    }
}
