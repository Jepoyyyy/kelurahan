<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormControllerexm extends Controller
{
    protected array $steps = [
        'pemohon',
        'ayah',
        'ibu',
        'pasangan',
        'overview', 
        'success'
    ];

    public function show(string $step)
    {
        if (!in_array($step, $this->steps)) abort(404);

        // 🔐 GUARD - SKIP untuk success dan overview
        if (!in_array($step, ['success', 'overview'])) {
            if ($redirect = $this->guardStep($step)) {
                return $redirect;
            }
        }

        // STEP OVERVIEW - Validasi data ada
        if ($step === 'overview') {
            // Cek apakah semua data sudah ada
            if (!session()->has('form.pemohon') ||
                !session()->has('form.ayah') ||
                !session()->has('form.ibu') ||
                !session()->has('form.pasangan')) {
                return redirect('/form/pemohon')
                    ->with('error', 'Mohon lengkapi semua data terlebih dahulu');
            }

            return view('wizardform', [
                'step' => $step,
                'pemohon' => session('form.pemohon'),
                'ayah'    => session('form.ayah'),
                'ibu'     => session('form.ibu'),
                'pasangan' => session('form.pasangan'),
            ]);
        }

        // STEP SUCCESS - Tidak perlu data
        if ($step === 'success') {
            return view('wizardform', [
                'step' => 'success'
            ]);
        }

        // STEP BIASA (pemohon/ayah/ibu)
        return view('wizardform', [
            'step' => $step,
            'data' => session("form.$step", [])
        ]);
    }

    public function store(Request $request, string $step)
    {
        if (!in_array($step, ['pemohon', 'ayah', 'ibu', 'pasangan'])) {
            abort(404);
        }

        $validated = match ($step) {
            'pemohon' => $this->validatePemohon($request),
            'ayah'    => $this->validateAyah($request),
            'ibu'     => $this->validateIbu($request),
            'pasangan' => $this->validatePasangan($request),
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
            'status' => 'required',
            'beristrike'  => 'nullable',
            'namapartnersebelumnyapemohon' => 'nullable'
        ]);
    }

    protected function validateAyah(Request $request): array
    {
        return $request->validate([
            'namaayah' => 'required|string|max:255',
            'namaayahayah' => 'required|string|max:255',
            'NIKayah'  => 'required|digits:16',
            'TempatLayah' => 'required',
            'TanggalLayah'=> 'required',
            'WNayah' => 'required',
            'Agamaayah' => 'required',
            'Pekerjaanayah' => 'required',
            'Alamatayah' => 'required',

        ]);
    }

    protected function validateIbu(Request $request): array
    {
        return $request->validate([
            'namaibu' => 'required|string|max:255',
            'namaayahibu' => 'required|string|max:255',
            'NIKibu'  => 'required|digits:16',
            'TempatLibu' => 'required',
            'TanggalLibu'=> 'required',
            'WNibu' => 'required',
            'Agamaibu' => 'required',
            'Pekerjaanibu' => 'required',
            'Alamatibu' => 'required',

        ]);
    }

    protected function validatePasangan(Request $request): array
    {
        return $request->validate([
            'namapasangan' => 'required|string|max:255',
            'namaayahpasangan' => 'required|string|max:255',
            'NIKpasangan'  => 'required|digits:16',
            'TempatLpasangan' => 'required',
            'TanggalLpasangan'=> 'required',
            'WNpasangan' => 'required',
            'Agamapasangan' => 'required',
            'Pekerjaanpasangan' => 'required',
            'Alamatpasangan' => 'required',
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

    public function finalSubmit()
    {

        $pemohon = session('form.pemohon');
        $ayah = session('form.ayah');
        $ibu = session('form.ibu');
        $pasangan = session('form.pasangan');

        // Validasi data lengkap
        if (!$pemohon || !$ayah || !$ibu || !$pasangan) {
            return redirect('/form/pemohon')
                ->with('error', 'Data belum lengkap');
        }

        DB::beginTransaction();
        try {
            // Store pemohon
            $pemohonId = DB::table('pemohons')->insertGetId([
                'nama' => $pemohon['namapemohon'],
                'nik' => $pemohon['NIKpemohon'],
                'gender' => $pemohon['gender'],
                'tempat_lahir' => $pemohon['Tempatpemohon'],
                'tanggal_lahir' => $pemohon['Tanggalpemohon'],
                'kewarganegaraan' => $pemohon['WNpemohon'],
                'agama' => $pemohon['Agamapemohon'],
                'pekerjaan' => $pemohon['Pekerjaanpemohon'],
                'alamat' => $pemohon['Alamatpemohon'],
                'rt' => $pemohon['rtpemohon'],
                'status' => $pemohon['status'],
                'beristri_ke' => $pemohon['beristri_ke'] ?? null,
                'nama_partner_sebelumnya' => $pemohon['namapartnersebelumnyapemohon'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Store ayah
            DB::table('ayahs')->insert([
                'nama' => $ayah['namaayah'],
                'namaayah' => $ayah['namaayahayah'],
                'nik' => $ayah['NIKayah'],
                'tempat_lahir' => $ayah['TempatLayah'],
                'tanggal_lahir' => $ayah['TanggalLayah'],
                'kewarganegaraan' => $ayah['WNayah'],
                'agama' => $ayah['Agamaayah'],
                'pekerjaan' => $ayah['Pekerjaanayah'],
                'alamat' => $ayah['Alamatayah'],
                'pemohon_id' => $pemohonId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Store ibu
            DB::table('ibus')->insert([
                'nama' => $ibu['namaibu'],
                'namaayah' => $ibu['namaayahibu'],
                'nik' => $ibu['NIKibu'],
                'tempat_lahir' => $ibu['TempatLibu'],
                'tanggal_lahir' => $ibu['TanggalLibu'],
                'kewarganegaraan' => $ibu['WNibu'],
                'agama' => $ibu['Agamaibu'],
                'pekerjaan' => $ibu['Pekerjaanibu'],
                'alamat' => $ibu['Alamatibu'],
                'pemohon_id' => $pemohonId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('pasangans')->insert([
                'nama' => $pasangan['namapasangan'],
                'namaayah' => $pasangan['namaayahpasangan'],
                'nik' => $pasangan['NIKpasangan'],
                'tempat_lahir' => $pasangan['TempatLpasangan'],
                'tanggal_lahir' => $pasangan['TanggalLpasangan'],
                'kewarganegaraan' => $ibu['WNibu'],
                'agama' => $ibu['Agamaibu'],
                'pekerjaan' => $ibu['Pekerjaanibu'],
                'alamat' => $ibu['Alamatibu'],
                'pemohon_id' => $pemohonId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

           session()->forget('form');

            return redirect()->route('form.success');
        }catch (\Exception $e) {
    DB::rollBack();

    dd('ERROR DB FINAL SUBMIT:', $e->getMessage());
}

    }
}
