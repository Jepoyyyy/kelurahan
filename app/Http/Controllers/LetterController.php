<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use App\Models\Pemohon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LetterController extends Controller
{
    protected function generatePdf(string $view, array $data = [], string $filename = 'document.pdf', array $options = [])
    {
        $pdf = Pdf::loadView($view, $data)
                  ->setPaper($options['paper'] ?? 'a4', $options['orientation'] ?? 'portrait')
                  ->setOptions(['dpi' => $options['dpi'] ?? 150]);

        return $pdf->stream($filename);
    }

    public function generateN1($id)
    {
        $pemohon = Pemohon::with(['ayah', 'ibu'])->findOrFail($id);
        $todaydate = Carbon::now()->translatedFormat('d F Y');
        $data = [
            'pemohon' => $pemohon,
            'ayah' => $pemohon->ayah,
            'ibu' => $pemohon->ibu,
            'todaydate' => $todaydate
        ];

        $filename = 'Dokumen N1 ' . Str::slug($pemohon->nama) . '.pdf';
        return $this->generatePdf('pdf.N1', $data, $filename);
    }
}

