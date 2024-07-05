<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\PDF;


class PdfProdutoController extends Controller
{
    public function geraPdf()
    {
        $produtos = Produto::all();
        $pdf = PDF::loadView('pdf.pdfProduto', ["produtos" => $produtos]);
        return $pdf->download('relatorio de produtos.pdf');

        
    }
}
