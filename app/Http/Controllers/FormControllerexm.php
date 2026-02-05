<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormControllerexm extends Controller
{
    protected array $steps = [
        'pemohon',
        'ayah',
        'ibu',
        'overview'
    ];

    public function show(string $step)
{
    if (!in_array($step, $this->steps)) abort(404);

    if ($redirect = $this->guardStep($step)) return $redirect;

    if ($step === 'overview') {
        return view('wizardform', [
            'step' => $step,
            'pemohon' => session('form.pemohon'),
            'ayah'    => session('form.ayah'),
            'ibu'     => session('form.ibu'),
        ]);
    }

    return view('wizardform', [
        'step' => $step,
        'data' => session("form.$step", [])
    ]);
}



    public function store(Request $request, string $step)
    {
        $validated = match ($step) {
            'pemohon' => $this->validatePemohon($request),
            'ayah'    => $this->validateAyah($request),
            'ibu'     => $this->validateIbu($request),
            default   => abort(404)
        };

        session(["form.$step" => $validated]);

        return redirect('/form/' . $this->nextStep($step));
    }
    protected function validatePemohon(Request $request): array
    {
        return $request->validate([
            'namapemohon' => 'required|string|max:255',
            'NIKpemohon'  => 'required|digits:16',
            'gender'      => 'required',
            'Tempatpemohon' => 'required',
            'Tanggalpemohon' => 'required',
            'WNpemohon'   => 'required',
            'Agamapemohon'=> 'required',
            'Pekerjaanpemohon' => 'required',
            'Alamatpemohon' => 'required',
            'rtpemohon'   => 'required',
            'letter_type' => 'required',
            'beristrike'  => 'nullable',
            'namapartnersebelumnyapemohon' => 'nullable'
        ]);
    }

    protected function validateAyah(Request $request): array
    {
        return $request->validate([
            'namaayah' => 'required|string|max:255',
            'NIKayah'  => 'required|digits:16',
            'TempatLayah' => 'required',
            'TanggalLayah'=> 'required',
            'WNayah' => 'required',
            'Agamaayah' => 'required',
            'Pekerjaanayah' => 'required',
            'Alamatayah' => 'required',
            'RTayah' => 'required',
        ]);
    }

    protected function validateIbu(Request $request): array
    {
        return $request->validate([
            'namaibu' => 'required|string|max:255',
            'NIKibu'  => 'required|digits:16',
            'TempatLibu' => 'required',
            'TanggalLibu'=> 'required',
            'WNibu' => 'required',
            'Agamaibu' => 'required',
            'Pekerjaanibu' => 'required',
            'Alamatibu' => 'required',
            'RTibu' => 'required',
        ]);
    }
    protected function guardStep(string $step)
{
    $index = array_search($step, $this->steps, true);

    for ($i = 0; $i < $index; $i++) {
        if (!session()->has("form.{$this->steps[$i]}")) {
            return redirect('/form/' . $this->steps[$i]);
        }
    }

    return null;
}


   protected function nextStep(string $current): string
{
    $current = strtolower(trim($current));

    $steps = array_map(fn($s) => strtolower(trim($s)), $this->steps);

    $index = array_search($current, $steps, true);

    if ($index === false) {
        abort(400, "Step '$current' tidak dikenali");
    }

    return $steps[$index + 1] ?? 'overview';
}



}
