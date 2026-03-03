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
                !session()->has('form.ibu')) {
                return redirect('/form/pemohon')
                    ->with('error', 'Mohon lengkapi semua data terlebih dahulu');
            }

            return view('wizardform', [
                'step' => $step,
                'pemohon' => session('form.pemohon'),
                'ayah'    => session('form.ayah'),
                'ibu'     => session('form.ibu'),
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
        // Pastikan step valid dan bukan overview/success
    //     if ($step === 'overview') {
    //     return redirect('/form-final-submit');
    // }
        if (!in_array($step, ['pemohon', 'ayah', 'ibu'])) {
            abort(404);
        }

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
            'status' => 'required',
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

    public function finalSubmit()
    {

        $pemohon = session('form.pemohon');
        $ayah = session('form.ayah');
        $ibu = session('form.ibu');

        // Validasi data lengkap
        if (!$pemohon || !$ayah || !$ibu) {
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
                'nik' => $ayah['NIKayah'],
                'tempat_lahir' => $ayah['TempatLayah'],
                'tanggal_lahir' => $ayah['TanggalLayah'],
                'kewarganegaraan' => $ayah['WNayah'],
                'agama' => $ayah['Agamaayah'],
                'pekerjaan' => $ayah['Pekerjaanayah'],
                'alamat' => $ayah['Alamatayah'],
                'rt' => $ayah['RTayah'],
                'pemohon_id' => $pemohonId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Store ibu
            DB::table('ibus')->insert([
                'nama' => $ibu['namaibu'],
                'nik' => $ibu['NIKibu'],
                'tempat_lahir' => $ibu['TempatLibu'],
                'tanggal_lahir' => $ibu['TanggalLibu'],
                'kewarganegaraan' => $ibu['WNibu'],
                'agama' => $ibu['Agamaibu'],
                'pekerjaan' => $ibu['Pekerjaanibu'],
                'alamat' => $ibu['Alamatibu'],
                'rt' => $ibu['RTibu'],
                'pemohon_id' => $pemohonId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

           session()->forget('form');

            return redirect()->route('form.success');
        // } catch (\Exception $e) {
        //     DB::rollBack();

        //     return redirect('/form/overview')
        //         ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        // }
        }catch (\Exception $e) {
    DB::rollBack();

    dd('ERROR DB FINAL SUBMIT:', $e->getMessage());
}

    }
}
