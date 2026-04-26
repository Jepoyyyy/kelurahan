<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of all services.
     */
    public function index()
    {
        $layanan = $this->getLayananData();

        return view('pages.layanan.index', compact('layanan'));
    }

    /**
     * Display the specified service detail.
     */
    public function show(string $slug)
    {
        $layanan = $this->getLayananData();

        $service = collect($layanan)->firstWhere('slug', $slug);

        if (!$service) {
            abort(404, 'Layanan tidak ditemukan');
        }

        return view('pages.layanan.show', compact('service'));
    }

    /**
     * Get all layanan data.
     * You can move this to a database or separate config file.
     */
    private function getLayananData(): array
    {
        return [
            [
                'slug' => 'surat-kelahiran',
                'judul' => 'Surat Kelahiran',
                'deskripsi' => 'Layanan penerbitan surat keterangan kelahiran untuk bayi yang baru lahir di wilayah kelurahan.',
                'syarat' => [
                    'Fotokopi KTP orang tua',
                    'Fotokopi Kartu Keluarga',
                    'Surat keterangan lahir dari bidan/rumah sakit',
                    'Fotokopi surat nikah orang tua',
                ],
                'langkah' => [
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Ambil nomor antrean di loket pelayanan.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat.',
                    'Ambil surat kelahiran yang sudah selesai.',
                ],
                'detail' => [
                    'pengertian' => 'Surat Kelahiran adalah dokumen resmi yang dikeluarkan oleh kelurahan sebagai bukti kelahiran seseorang di wilayah tersebut.',
                    'kapan_dibutuhkan' => 'Surat ini dibutuhkan setelah bayi lahir untuk keperluan pembuatan akta kelahiran di Disdukcapil.',
                    'fungsi' => 'Sebagai syarat utama pembuatan akta kelahiran dan pendaftaran ke dalam Kartu Keluarga.',
                ],
            ],
            [
                'slug' => 'surat-kematian',
                'judul' => 'Surat Kematian',
                'deskripsi' => 'Layanan penerbitan surat keterangan kematian untuk warga yang meninggal dunia.',
                'syarat' => [
                    'Fotokopi KTP almarhum/almarhumah',
                    'Fotokopi Kartu Keluarga',
                    'Surat keterangan kematian dari rumah sakit/dokter/RT/RW',
                    'Fotokopi KTP pelapor',
                ],
                'langkah' => [
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Ambil nomor antrean di loket pelayanan.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat.',
                    'Ambil surat kematian yang sudah selesai.',
                ],
                'detail' => [
                    'pengertian' => 'Surat Kematian adalah dokumen resmi yang menyatakan bahwa seseorang telah meninggal dunia.',
                    'kapan_dibutuhkan' => 'Surat ini dibutuhkan segera setelah seseorang meninggal dunia untuk keperluan administrasi.',
                    'fungsi' => 'Sebagai syarat pembuatan akta kematian, pengurusan warisan, dan penghapusan data dari Kartu Keluarga.',
                ],
            ],
            [
                'slug' => 'surat-pindah',
                'judul' => 'Surat Pindah',
                'deskripsi' => 'Layanan penerbitan surat keterangan pindah domisili untuk warga yang akan pindah ke wilayah lain.',
                'syarat' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga',
                    'Surat pengantar dari RT/RW',
                    'Mengisi formulir permohonan pindah',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir permohonan pindah.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat pindah.',
                    'Ambil surat pindah yang sudah selesai.',
                ],
            ],
            [
                'slug' => 'surat-domisili',
                'judul' => 'Surat Domisili',
                'deskripsi' => 'Layanan penerbitan surat keterangan domisili untuk keperluan administrasi.',
                'syarat' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga',
                    'Surat pengantar dari RT/RW',
                    'Pas foto 3x4 (2 lembar)',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat.',
                    'Ambil surat domisili yang sudah selesai.',
                ],
            ],
            [
                'slug' => 'surat-nikah',
                'judul' => 'Surat Pengantar Nikah',
                'deskripsi' => 'Layanan penerbitan surat pengantar nikah untuk keperluan pendaftaran pernikahan di KUA.',
                'syarat' => [
                    'Fotokopi KTP calon pengantin',
                    'Fotokopi Kartu Keluarga',
                    'Fotokopi akta kelahiran',
                    'Surat pengantar dari RT/RW',
                    'Pas foto 2x3 dan 4x6 (masing-masing 4 lembar)',
                    'Surat keterangan belum menikah (N1, N2, N4)',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir yang disediakan.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat pengantar nikah.',
                    'Ambil surat pengantar nikah untuk dibawa ke KUA.',
                ],
            ],
            [
                'slug' => 'pbb-baru',
                'judul' => 'Pendaftaran PBB Baru',
                'deskripsi' => 'Layanan pendaftaran objek Pajak Bumi dan Bangunan (PBB) baru.',
                'syarat' => [
                    'Fotokopi KTP pemilik',
                    'Fotokopi sertifikat tanah/AJB/girik',
                    'Fotokopi IMB (jika ada bangunan)',
                    'Surat kuasa (jika dikuasakan)',
                    'Mengisi formulir SPOP dan LSPOP',
                ],
                'langkah' => [
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir SPOP (Surat Pemberitahuan Objek Pajak).',
                    'Isi formulir LSPOP (Lampiran SPOP).',
                    'Serahkan dokumen ke petugas PBB.',
                    'Tunggu proses verifikasi dan pendataan.',
                    'SPPT PBB akan dikirim ke alamat wajib pajak.',
                ],
                'detail' => [
                    'pengertian' => 'PBB adalah pajak yang dikenakan atas kepemilikan tanah dan/atau bangunan.',
                    'kapan_dibutuhkan' => 'Pendaftaran PBB baru diperlukan saat memiliki tanah/bangunan yang belum terdaftar sebagai objek pajak.',
                    'fungsi' => 'Untuk mendapatkan SPPT PBB sebagai bukti kepemilikan objek pajak dan kewajiban membayar pajak.',
                ],
            ],
            [
                'slug' => 'pbb-mutasi',
                'judul' => 'Mutasi PBB',
                'deskripsi' => 'Layanan perubahan data kepemilikan objek Pajak Bumi dan Bangunan (PBB).',
                'syarat' => [
                    'Fotokopi KTP pemilik baru',
                    'Fotokopi SPPT PBB tahun berjalan',
                    'Fotokopi bukti pelunasan PBB 5 tahun terakhir',
                    'Fotokopi akta jual beli/hibah/waris',
                    'Fotokopi sertifikat tanah',
                ],
                'langkah' => [
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir permohonan mutasi PBB.',
                    'Serahkan dokumen ke petugas PBB.',
                    'Tunggu proses verifikasi data.',
                    'SPPT PBB dengan nama pemilik baru akan dikirim ke alamat.',
                ],
            ],
            [
                'slug' => 'sktm',
                'judul' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'deskripsi' => 'Layanan penerbitan SKTM untuk keperluan bantuan sosial, keringanan biaya pendidikan, dan kesehatan.',
                'syarat' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga',
                    'Surat pengantar dari RT/RW',
                    'Surat pernyataan tidak mampu',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir permohonan SKTM.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan SKTM.',
                    'Ambil SKTM yang sudah selesai.',
                ],
                'detail' => [
                    'pengertian' => 'SKTM adalah surat keterangan yang menyatakan bahwa seseorang atau keluarga termasuk dalam kategori tidak mampu secara ekonomi.',
                    'kapan_dibutuhkan' => 'Dibutuhkan saat mengajukan bantuan sosial, keringanan biaya sekolah, atau biaya rumah sakit.',
                    'fungsi' => 'Sebagai bukti resmi untuk mendapatkan bantuan sosial atau keringanan biaya dari pemerintah maupun institusi lainnya.',
                ],
            ],
            [
                'slug' => 'skck',
                'judul' => 'Surat Pengantar SKCK',
                'deskripsi' => 'Layanan penerbitan surat pengantar untuk pembuatan SKCK di kepolisian.',
                'syarat' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga',
                    'Surat pengantar dari RT/RW',
                    'Pas foto 4x6 latar merah (6 lembar)',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat pengantar.',
                    'Ambil surat pengantar SKCK.',
                    'Bawa surat pengantar ke kantor polisi untuk pembuatan SKCK.',
                ],
            ],
            [
                'slug' => 'surat-usaha',
                'judul' => 'Surat Keterangan Usaha',
                'deskripsi' => 'Layanan penerbitan surat keterangan usaha untuk keperluan perizinan atau pengajuan kredit.',
                'syarat' => [
                    'Fotokopi KTP pemilik usaha',
                    'Fotokopi Kartu Keluarga',
                    'Surat pengantar dari RT/RW',
                    'Foto lokasi usaha',
                    'Surat pernyataan kepemilikan usaha',
                ],
                'langkah' => [
                    'Minta surat pengantar dari RT/RW setempat.',
                    'Datang ke kantor kelurahan dengan membawa dokumen persyaratan.',
                    'Isi formulir permohonan surat keterangan usaha.',
                    'Serahkan dokumen ke petugas untuk diverifikasi.',
                    'Tunggu proses pembuatan surat.',
                    'Ambil surat keterangan usaha yang sudah selesai.',
                ],
            ],
        ];
    }
}
