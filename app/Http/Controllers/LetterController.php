<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as Pdf;

class LetterController extends Controller
{
    public function generatePdf()
    {
        $pdf = PDF::loadView('pdf.N1');
        return $pdf->stream('file.pdf');
    }
}

