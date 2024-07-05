<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Barryvdh\DomPDF\Facade\PDF;

class PdfFornecedorController extends Controller
{
    public function geraPdf()
    {
        $fornecedores = Fornecedor::all();
        $pdf = PDF::loadView('pdf.pdfFornecedor', ["fornecedores" => $fornecedores])
                    ->setPaper('a4', 'landscape');
        return $pdf->download('relatorio de fornecedores.pdf');

        
    }
}
