<?php

return [

    'list' => [

        [
            'slug'      => 'surat-kelahiran',
            'judul'     => 'Surat Kelahiran',
            'url'       => '/layanan/surat-kelahiran',
            'deskripsi' => 'Surat keterangan resmi dari kelurahan sebagai bukti kelahiran warga.',

            'syarat' => [
                'Fotokopi KTP orang tua',
                'Fotokopi KK',
                'Surat keterangan lahir dari bidan/RS',
                'Surat pengantar RT/RW',
            ],

            'langkah' => [
                'Datang ke kantor kelurahan',
                'Serahkan berkas ke petugas',
                'Verifikasi data',
                'Surat diterbitkan',
            ],
        ],

        [
            'slug'      => 'surat-kematian',
            'judul'     => 'Surat Kematian',
            'url'       => '/layanan/surat-kematian',
            'deskripsi' => 'Surat pengantar kelurahan untuk pengurusan akta kematian.',

            'syarat' => [
                'Fotokopi KTP almarhum',
                'Fotokopi KK',
                'Surat keterangan dari RS',
                'Pengantar RT/RW',
            ],

            'langkah' => [
                'Laporkan ke RT/RW',
                'Bawa berkas ke kelurahan',
                'Verifikasi',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Nikah',
            'url' => '/layanan/surat-nikah',
            'deskripsi' => 'Surat pengantar dari kelurahan sebagai syarat administrasi pernikahan di KUA atau instansi pencatatan sipil.',
            'syarat' => [
                'Fotokopi KTP kedua calon',
                'Fotokopi Kartu Keluarga',
                'Surat pengantar RT/RW',
                'Pas foto 3x4 (2 lembar)',
            ],
            'langkah' => [
                'Datang ke kantor kelurahan dengan membawa berkas',
                'Serahkan berkas ke petugas pelayanan',
                'Petugas melakukan verifikasi data',
                'Surat pengantar nikah diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Duda/Janda',
            'url' => '/layanan/surat-duda-janda',
            'deskripsi' => 'Surat keterangan status pernikahan warga setelah bercerai atau ditinggal pasangan.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Akta cerai / akta kematian pasangan',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Ajukan permohonan ke kelurahan',
                'Serahkan dokumen pendukung',
                'Petugas verifikasi',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Belum Menikah',
            'url' => '/layanan/surat-belum-menikah',
            'deskripsi' => 'Surat keterangan bahwa seseorang belum pernah menikah.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang ke kelurahan',
                'Isi formulir permohonan',
                'Verifikasi oleh petugas',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Belum Bekerja',
            'url' => '/layanan/surat-belum-bekerja',
            'deskripsi' => 'Surat keterangan belum memiliki pekerjaan tetap.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Ajukan ke kelurahan',
                'Serahkan dokumen',
                'Verifikasi data',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Tidak Mampu',
            'url' => '/layanan/surat-tidak-mampu',
            'deskripsi' => 'Surat keterangan kondisi ekonomi warga kurang mampu.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
                'Foto rumah (opsional)',
            ],
            'langkah' => [
                'Pengajuan ke kelurahan',
                'Survey (jika diperlukan)',
                'Verifikasi oleh petugas',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Domisili',
            'url' => '/layanan/surat-domisili',
            'deskripsi' => 'Surat keterangan tempat tinggal warga.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang ke kelurahan',
                'Serahkan dokumen',
                'Verifikasi data',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Domisili Usaha',
            'url' => '/layanan/surat-domisili-usaha',
            'deskripsi' => 'Surat keterangan lokasi usaha.',
            'syarat' => [
                'Fotokopi KTP pemilik',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
                'Foto lokasi usaha',
            ],
            'langkah' => [
                'Ajukan ke kelurahan',
                'Serahkan dokumen usaha',
                'Verifikasi lokasi (opsional)',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Keterangan Gaib (Hilang)',
            'url' => '/layanan/surat-gaib',
            'deskripsi' => 'Surat keterangan orang hilang.',
            'syarat' => [
                'Fotokopi KTP pelapor',
                'Fotokopi KK',
                'Surat laporan kehilangan (jika ada)',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Laporkan ke kelurahan',
                'Serahkan dokumen',
                'Verifikasi',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Ahli Waris',
            'url' => '/layanan/surat-ahli-waris',
            'deskripsi' => 'Penetapan ahli waris dari almarhum.',
            'syarat' => [
                'Fotokopi KTP ahli waris',
                'Fotokopi KK',
                'Akta kematian',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Ajukan permohonan',
                'Verifikasi data keluarga',
                'Penyusunan surat',
                'Surat diterbitkan',
            ],
        ],

        [
            'judul' => 'Surat Beda Nama / Tanggal Lahir',
            'url' => '/layanan/surat-beda-nama',
            'deskripsi' => 'Surat keterangan perbedaan data identitas.',
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Dokumen yang berbeda',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang ke kelurahan',
                'Serahkan dokumen pembanding',
                'Verifikasi oleh petugas',
                'Surat diterbitkan',
            ],
        ],


        // =========================
        // 🔥 PBB (NAH INI YANG PENTING)
        // =========================

        [
            'slug'      => 'pbb-baru',
            'judul'     => 'PBB Baru',
            'url'       => '/layanan/pbb-baru',
            'deskripsi' => 'Pengajuan objek pajak baru untuk tanah/bangunan.',

            'syarat' => [
                'Fotokopi KTP pemohon',
                'Fotokopi sertifikat tanah',
                'SPPT lama (jika ada)',
                'Denah lokasi',
            ],

            'langkah' => [
                'Ajukan ke kelurahan',
                'Verifikasi data tanah',
                'Pengukuran (jika diperlukan)',
                'Penerbitan SPPT baru',
            ],
        ],

        [
            'slug'      => 'pbb-pemecahan',
            'judul'     => 'Pemecahan PBB',
            'url'       => '/layanan/pbb-pemecahan',
            'deskripsi' => 'Memecah satu objek pajak menjadi beberapa.',

            'syarat' => [
                'Fotokopi KTP',
                'Sertifikat tanah',
                'SPPT terakhir',
                'Denah pemecahan',
            ],

            'langkah' => [
                'Ajukan permohonan',
                'Verifikasi dokumen',
                'Proses pemecahan',
                'SPPT baru diterbitkan',
            ],
        ],

        [
            'slug'      => 'pbb-perubahan',
            'judul'     => 'Perubahan PBB',
            'url'       => '/layanan/pbb-perubahan',
            'deskripsi' => 'Perubahan data objek pajak.',

            'syarat' => [
                'KTP',
                'SPPT lama',
                'Dokumen pendukung perubahan',
            ],

            'langkah' => [
                'Ajukan perubahan',
                'Validasi data',
                'Update sistem',
                'SPPT diperbarui',
            ],
        ],

        [
            'slug'      => 'pbb-penghapusan',
            'judul'     => 'Penghapusan PBB',
            'url'       => '/layanan/pbb-penghapusan',
            'deskripsi' => 'Penghapusan objek pajak.',

            'syarat' => [
                'KTP',
                'SPPT',
                'Bukti pendukung (tanah tidak ada / sengketa)',
            ],

            'langkah' => [
                'Ajukan penghapusan',
                'Survey lapangan',
                'Verifikasi',
                'Penghapusan data',
            ],
        ],

        [
            'slug'      => 'pbb-penggabungan',
            'judul'     => 'Penggabungan PBB',
            'url'       => '/layanan/pbb-penggabungan',
            'deskripsi' => 'Menggabungkan beberapa objek pajak menjadi satu.',

            'syarat' => [
                'KTP',
                'Sertifikat tanah',
                'SPPT masing-masing objek',
            ],

            'langkah' => [
                'Ajukan penggabungan',
                'Cek data objek',
                'Proses sistem',
                'SPPT gabungan diterbitkan',
            ],
        ],

    ],

];
