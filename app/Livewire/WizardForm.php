<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class WizardForm extends Component
{
    // Step control
    public string $step = 'pemohon';
    public array $steps = ['pemohon', 'ayah', 'ibu', 'pasangan', 'overview'];

    // Data per step
    public array $pemohon  = [];
    public array $ayah     = [];
    public array $ibu      = [];
    public array $pasangan = [];

    // Validasi per step
    protected function rules(): array
    {
        return match($this->step) {
            'pemohon' => [
                'pemohon.nama'       => 'required|string|max:255',
                'pemohon.nik'        => 'required|digits:16',
                'pemohon.gender'     => 'required',
                'pemohon.tempat_lahir'  => 'required',
                'pemohon.tanggal_lahir' => 'required|date',
                'pemohon.wn'         => 'required',
                'pemohon.agama'      => 'required',
                'pemohon.pekerjaan'  => 'required',
                'pemohon.alamat'     => 'required',
                'pemohon.rt'         => 'required',
                'pemohon.status'     => 'required',
            ],
            'ayah' => [
                'ayah.nama'          => 'required|string|max:255',
                'ayah.nama_ayah'     => 'required|string|max:255',
                'ayah.nik'           => 'required|digits:16',
                'ayah.tempat_lahir'  => 'required',
                'ayah.tanggal_lahir' => 'required|date',
                'ayah.wn'            => 'required',
                'ayah.agama'         => 'required',
                'ayah.pekerjaan'     => 'required',
                'ayah.alamat'        => 'required',
            ],
            'ibu' => [
                'ibu.nama'           => 'required|string|max:255',
                'ibu.nama_ayah'      => 'required|string|max:255',
                'ibu.nik'            => 'required|digits:16',
                'ibu.tempat_lahir'   => 'required',
                'ibu.tanggal_lahir'  => 'required|date',
                'ibu.wn'             => 'required',
                'ibu.agama'          => 'required',
                'ibu.pekerjaan'      => 'required',
                'ibu.alamat'         => 'required',
            ],
            'pasangan' => [
                'pasangan.nama'          => 'required|string|max:255',
                'pasangan.nama_ayah'     => 'required|string|max:255',
                'pasangan.nik'           => 'required|digits:16',
                'pasangan.tempat_lahir'  => 'required',
                'pasangan.tanggal_lahir' => 'required|date',
                'pasangan.wn'            => 'required',
                'pasangan.agama'         => 'required',
                'pasangan.pekerjaan'     => 'required',
                'pasangan.alamat'        => 'required',
            ],
            default => []
        };
    }

    // Pindah ke step berikutnya
    public function nextStep(): void
    {
        if ($this->step !== 'overview') {
            $this->validate();
        }

        $currentIndex  = array_search($this->step, $this->steps);
        $this->step    = $this->steps[$currentIndex + 1] ?? 'overview';
    }

    // Kembali ke step sebelumnya
    public function prevStep(): void
    {
        $currentIndex = array_search($this->step, $this->steps);
        if ($currentIndex > 0) {
            $this->step = $this->steps[$currentIndex - 1];
        }
    }

    // Submit akhir ke database
    public function finalSubmit(): void
    {
        DB::beginTransaction();
        try {
            $pemohonId = DB::table('pemohons')->insertGetId([
                'nama'                   => $this->pemohon['nama'],
                'nik'                    => $this->pemohon['nik'],
                'gender'                 => $this->pemohon['gender'],
                'tempat_lahir'           => $this->pemohon['tempat_lahir'],
                'tanggal_lahir'          => $this->pemohon['tanggal_lahir'],
                'kewarganegaraan'        => $this->pemohon['wn'],
                'agama'                  => $this->pemohon['agama'],
                'pekerjaan'              => $this->pemohon['pekerjaan'],
                'alamat'                 => $this->pemohon['alamat'],
                'rt'                     => $this->pemohon['rt'],
                'status'                 => $this->pemohon['status'],
                'beristri_ke'            => $this->pemohon['beristri_ke'] ?? null,
                'nama_partner_sebelumnya'=> $this->pemohon['nama_partner_sebelumnya'] ?? null,
                'created_at'             => now(),
                'updated_at'             => now(),
            ]);

            DB::table('ayahs')->insert([
                'nama'          => $this->ayah['nama'],
                'namaayah'      => $this->ayah['nama_ayah'],
                'nik'           => $this->ayah['nik'],
                'tempat_lahir'  => $this->ayah['tempat_lahir'],
                'tanggal_lahir' => $this->ayah['tanggal_lahir'],
                'kewarganegaraan' => $this->ayah['wn'],
                'agama'         => $this->ayah['agama'],
                'pekerjaan'     => $this->ayah['pekerjaan'],
                'alamat'        => $this->ayah['alamat'],
                'pemohon_id'    => $pemohonId,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::table('ibus')->insert([
                'nama'          => $this->ibu['nama'],
                'namaayah'      => $this->ibu['nama_ayah'],
                'nik'           => $this->ibu['nik'],
                'tempat_lahir'  => $this->ibu['tempat_lahir'],
                'tanggal_lahir' => $this->ibu['tanggal_lahir'],
                'kewarganegaraan' => $this->ibu['wn'],
                'agama'         => $this->ibu['agama'],
                'pekerjaan'     => $this->ibu['pekerjaan'],
                'alamat'        => $this->ibu['alamat'],
                'pemohon_id'    => $pemohonId,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::table('pasangans')->insert([
                'nama'          => $this->pasangan['nama'],
                'namaayah'      => $this->pasangan['nama_ayah'],
                'nik'           => $this->pasangan['nik'],
                'tempat_lahir'  => $this->pasangan['tempat_lahir'],
                'tanggal_lahir' => $this->pasangan['tanggal_lahir'],
                'kewarganegaraan' => $this->pasangan['wn'],
                'agama'         => $this->pasangan['agama'],
                'pekerjaan'     => $this->pasangan['pekerjaan'],
                'alamat'        => $this->pasangan['alamat'],
                'pemohon_id'    => $pemohonId,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::commit();
            $this->step = 'success';

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.wizard-form');
    }
}
