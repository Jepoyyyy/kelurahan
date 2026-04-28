<?php

return [

    'list' => [

        [
            'slug' => 'surat-kelahiran',
            'judul' => 'Surat Kelahiran',
            'url' => '/layanan/surat-kelahiran',
            'deskripsi' => 'Surat Kelahiran adalah dokumen resmi yang diterbitkan oleh kelurahan sebagai bukti awal kelahiran seorang warga. Dokumen ini biasanya dibutuhkan sebagai syarat untuk mengurus akta kelahiran di Dinas Kependudukan dan Catatan Sipil, serta pembaruan Kartu Keluarga.',
            'tags' => ['kelahiran','akta lahir','bayi','lahir','kk baru','administrasi anak'],
            'syarat' => [
                'Fotokopi KTP orang tua',
                'Fotokopi KK',
                'Surat keterangan lahir dari bidan/RS',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang langsung ke kantor kelurahan pada jam pelayanan',
                'Serahkan seluruh berkas persyaratan kepada petugas loket',
                'Petugas akan melakukan verifikasi data dan kelengkapan berkas',
                'Surat kelahiran diterbitkan dan dapat langsung diambil',
            ],
        ],

        [
            'slug' => 'surat-kematian',
            'judul' => 'Surat Kematian',
            'url' => '/layanan/surat-kematian',
            'deskripsi' => 'Surat Kematian adalah surat pengantar dari kelurahan yang diperlukan untuk mengurus akta kematian di instansi terkait. Dokumen ini juga dibutuhkan untuk keperluan administrasi lainnya seperti pengurusan warisan, pembatalan data kependudukan, dan klaim asuransi.',
            'tags' => ['kematian','meninggal','akta mati','almarhum','pemakaman','data penduduk'],
            'syarat' => [
                'Fotokopi KTP almarhum',
                'Fotokopi KK',
                'Surat keterangan dari RS',
                'Pengantar RT/RW',
            ],
            'langkah' => [
                'Laporkan kejadian kematian kepada RT/RW setempat untuk mendapatkan surat pengantar',
                'Bawa seluruh berkas persyaratan ke kantor kelurahan',
                'Petugas melakukan verifikasi data almarhum',
                'Surat kematian diterbitkan dan diserahkan kepada keluarga',
            ],
        ],

        [
            'slug' => 'surat-nikah',
            'judul' => 'Surat Nikah',
            'url' => '/layanan/surat-nikah',
            'deskripsi' => 'Surat Pengantar Nikah adalah surat resmi dari kelurahan yang menjadi salah satu syarat administrasi pendaftaran pernikahan di Kantor Urusan Agama (KUA). Surat ini membuktikan bahwa kedua calon mempelai berdomisili di wilayah kelurahan dan belum terdaftar dalam ikatan perkawinan lain.',
            'tags' => ['nikah','pernikahan','kawin','kua','catatan sipil','pasangan'],
            'syarat' => [
                'Fotokopi KTP kedua calon',
                'Fotokopi Kartu Keluarga',
                'Surat pengantar RT/RW',
                'Pas foto 3x4 (2 lembar)',
            ],
            'langkah' => [
                'Datang ke kantor kelurahan bersama atau mewakili kedua calon mempelai',
                'Serahkan seluruh berkas persyaratan ke petugas loket',
                'Petugas memverifikasi data kependudukan kedua calon',
                'Surat pengantar nikah diterbitkan dan dapat dibawa ke KUA',
            ],
        ],

        [
            'slug' => 'surat-duda-janda',
            'judul' => 'Surat Duda/Janda',
            'url' => '/layanan/surat-duda-janda',
            'deskripsi' => 'Surat Keterangan Duda atau Janda adalah dokumen yang menyatakan status pernikahan seseorang setelah bercerai atau ditinggal meninggal oleh pasangannya. Surat ini umumnya dibutuhkan untuk keperluan administrasi kependudukan, pernikahan kembali, atau pengajuan berbagai layanan pemerintah.',
            'tags' => ['cerai','duda','janda','status nikah','perceraian'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Akta cerai / akta kematian pasangan',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Ajukan permohonan ke kantor kelurahan dengan membawa seluruh berkas',
                'Petugas memverifikasi dokumen pendukung seperti akta cerai atau akta kematian',
                'Surat keterangan diterbitkan setelah data dinyatakan valid',
            ],
        ],

        [
            'slug' => 'surat-belum-menikah',
            'judul' => 'Surat Belum Menikah',
            'url' => '/layanan/surat-belum-menikah',
            'deskripsi' => 'Surat Keterangan Belum Menikah adalah dokumen resmi yang menyatakan bahwa seseorang belum pernah atau saat ini tidak sedang terikat dalam pernikahan. Surat ini sering dibutuhkan sebagai syarat melamar pekerjaan, mendaftar beasiswa, atau keperluan administrasi lainnya.',
            'tags' => ['single','belum kawin','status','nikah','pernikahan'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Isi formulir permohonan yang tersedia di kantor kelurahan',
                'Petugas memverifikasi data kependudukan pemohon',
                'Surat keterangan belum menikah diterbitkan dan dapat langsung diambil',
            ],
        ],

        [
            'slug' => 'surat-belum-bekerja',
            'judul' => 'Surat Belum Bekerja',
            'url' => '/layanan/surat-belum-bekerja',
            'deskripsi' => 'Surat Keterangan Belum Bekerja adalah dokumen yang menyatakan bahwa seseorang saat ini belum memiliki pekerjaan tetap. Dokumen ini biasanya diperlukan untuk mendaftar program bantuan pemerintah, pelatihan kerja, atau sebagai lampiran surat lamaran kerja.',
            'tags' => ['pengangguran','kerja','job','lowongan','status kerja'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang ke kantor kelurahan dan ajukan permohonan ke petugas',
                'Petugas melakukan verifikasi data kependudukan dan status pekerjaan',
                'Surat keterangan belum bekerja diterbitkan dan diserahkan kepada pemohon',
            ],
        ],

        [
            'slug' => 'surat-tidak-mampu',
            'judul' => 'Surat Tidak Mampu',
            'url' => '/layanan/surat-tidak-mampu',
            'deskripsi' => 'Surat Keterangan Tidak Mampu (SKTM) adalah dokumen resmi yang menyatakan kondisi ekonomi seseorang atau keluarga yang tergolong kurang mampu. SKTM digunakan untuk mengakses berbagai layanan bersubsidi seperti BPJS Kesehatan, beasiswa pendidikan, keringanan biaya rumah sakit, dan program bantuan sosial lainnya.',
            'tags' => ['miskin','bantuan','beasiswa','bpjs','subsidi','ekonomi'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
                'Foto rumah (opsional)',
            ],
            'langkah' => [
                'Ajukan permohonan ke kantor kelurahan dengan melampirkan seluruh berkas',
                'Petugas atau tim kelurahan akan melakukan survei langsung ke rumah pemohon untuk memverifikasi kondisi ekonomi',
                'Data hasil survei diverifikasi dan dicocokan dengan data kependudukan',
                'SKTM diterbitkan dan dapat digunakan untuk mengakses layanan yang dibutuhkan',
            ],
        ],

        [
            'slug' => 'surat-domisili',
            'judul' => 'Surat Domisili',
            'url' => '/layanan/surat-domisili',
            'deskripsi' => 'Surat Keterangan Domisili adalah dokumen yang menyatakan bahwa seseorang benar-benar bertempat tinggal di wilayah kelurahan. Surat ini diperlukan untuk berbagai keperluan administratif seperti pembukaan rekening bank, pendaftaran sekolah, melamar pekerjaan, hingga pengurusan izin usaha.',
            'tags' => ['alamat','tinggal','domisili','ktp','penduduk'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
            ],
            'langkah' => [
                'Datang ke kantor kelurahan dan serahkan berkas persyaratan ke petugas',
                'Petugas memverifikasi alamat tempat tinggal sesuai data kependudukan',
                'Surat keterangan domisili diterbitkan dan dapat langsung diambil',
            ],
        ],

        [
            'slug' => 'surat-domisili-usaha',
            'judul' => 'Surat Domisili Usaha',
            'url' => '/layanan/surat-domisili-usaha',
            'deskripsi' => 'Surat Keterangan Domisili Usaha adalah dokumen resmi yang menyatakan lokasi operasional sebuah usaha berada di wilayah kelurahan. Surat ini biasanya menjadi syarat untuk mengurus izin usaha, Nomor Induk Berusaha (NIB), atau pembukaan rekening bisnis di bank.',
            'tags' => ['usaha','bisnis','umkm','alamat usaha','izin'],
            'syarat' => [
                'Fotokopi KTP',
                'Fotokopi KK',
                'Surat pengantar RT/RW',
                'Foto lokasi usaha',
            ],
            'langkah' => [
                'Ajukan permohonan ke kantor kelurahan dengan melampirkan foto lokasi usaha',
                'Petugas memverifikasi keberadaan usaha dan kelengkapan berkas',
                'Surat keterangan domisili usaha diterbitkan dan dapat digunakan untuk pengurusan izin',
            ],
        ],

        [
            'slug' => 'surat-gaib',
            'judul' => 'Surat Gaib',
            'url' => '/layanan/surat-gaib',
            'deskripsi' => 'Surat Keterangan Orang Hilang atau Surat Gaib adalah dokumen dari kelurahan yang menyatakan bahwa seseorang telah dinyatakan hilang dan tidak diketahui keberadaannya. Surat ini diperlukan untuk keperluan hukum seperti pengurusan waris, pembekuan aset, atau pelaporan resmi kepada pihak berwajib.',
            'tags' => ['hilang','orang hilang','laporan','gaib'],
            'syarat' => [
                'Fotokopi KTP pelapor',
                'Fotokopi KK',
                'Surat laporan kehilangan',
            ],
            'langkah' => [
                'Laporkan kejadian kepada pihak kelurahan dengan membawa surat laporan kehilangan',
                'Petugas memverifikasi identitas pelapor dan data orang yang dilaporkan hilang',
                'Surat keterangan gaib diterbitkan setelah verifikasi selesai',
            ],
        ],

        [
            'slug' => 'surat-ahli-waris',
            'judul' => 'Surat Ahli Waris',
            'url' => '/layanan/surat-ahli-waris',
            'deskripsi' => 'Surat Keterangan Ahli Waris adalah dokumen resmi yang menetapkan siapa saja yang berhak menerima warisan dari seseorang yang telah meninggal dunia. Dokumen ini diperlukan untuk pengurusan aset, rekening bank, tanah, atau harta lainnya yang ditinggalkan oleh almarhum.',
            'tags' => ['warisan','ahli waris','keluarga','harta'],
            'syarat' => [
                'KTP ahli waris',
                'KK',
                'Akta kematian',
            ],
            'langkah' => [
                'Ajukan permohonan ke kantor kelurahan dengan melampirkan seluruh dokumen yang diperlukan',
                'Petugas memverifikasi hubungan keluarga dan keabsahan dokumen pendukung',
                'Surat keterangan ahli waris diterbitkan setelah proses verifikasi selesai',
            ],
        ],

        [
            'slug' => 'surat-beda-nama',
            'judul' => 'Surat Beda Nama',
            'url' => '/layanan/surat-beda-nama',
            'deskripsi' => 'Surat Keterangan Beda Nama adalah dokumen yang menyatakan bahwa dua nama berbeda yang tercantum dalam dokumen-dokumen terpisah merujuk pada orang yang sama. Surat ini sering dibutuhkan ketika terdapat perbedaan penulisan nama antara KTP, ijazah, akta lahir, atau dokumen resmi lainnya.',
            'tags' => ['beda nama','data salah','identitas','koreksi'],
            'syarat' => [
                'KTP',
                'KK',
                'Dokumen pembanding',
            ],
            'langkah' => [
                'Ajukan permohonan ke kantor kelurahan dengan membawa dokumen-dokumen yang memiliki perbedaan nama',
                'Petugas memverifikasi kesesuaian data dan menelaah dokumen pembanding',
                'Surat keterangan beda nama diterbitkan sebagai bukti bahwa kedua nama merujuk pada orang yang sama',
            ],
        ],

        [
            'slug' => 'pbb-baru',
            'judul' => 'PBB Baru',
            'url' => '/layanan/pbb-baru',
            'deskripsi' => 'Layanan Pendaftaran PBB Baru adalah proses pengajuan objek pajak baru atas tanah dan/atau bangunan yang belum terdaftar dalam sistem Pajak Bumi dan Bangunan (PBB). Pendaftaran ini diperlukan agar objek pajak mendapatkan Nomor Objek Pajak (NOP) dan Surat Pemberitahuan Pajak Terutang (SPPT) yang sah.',
            'tags' => ['pbb','pajak','tanah','bangunan','sppt'],
            'syarat' => [
                'KTP',
                'Sertifikat tanah',
            ],
            'langkah' => [
                'Ajukan permohonan pendaftaran PBB baru ke kantor kelurahan dengan melampirkan KTP dan sertifikat tanah',
                'Petugas melakukan verifikasi data objek pajak dan kepemilikan lahan',
                'SPPT diterbitkan sebagai bukti objek pajak telah terdaftar secara resmi',
            ],
        ],

        [
            'slug' => 'pbb-pemecahan',
            'judul' => 'Pemecahan PBB',
            'url' => '/layanan/pbb-pemecahan',
            'deskripsi' => 'Layanan Pemecahan PBB digunakan ketika sebuah objek pajak berupa tanah perlu dipecah menjadi dua atau lebih bidang yang terpisah, misalnya akibat jual beli sebagian lahan atau pembagian waris. Setiap bidang hasil pemecahan akan memiliki NOP dan SPPT tersendiri.',
            'tags' => ['pbb','pecah tanah','pajak'],
            'syarat' => ['KTP'],
            'langkah' => [
                'Ajukan permohonan pemecahan PBB ke kantor kelurahan dengan membawa KTP dan dokumen pendukung kepemilikan',
                'Petugas memproses pemecahan data objek pajak sesuai pembagian yang diminta',
            ],
        ],

        [
            'slug' => 'pbb-perubahan',
            'judul' => 'Perubahan PBB',
            'url' => '/layanan/pbb-perubahan',
            'deskripsi' => 'Layanan Perubahan PBB digunakan untuk memperbarui data objek pajak yang sudah terdaftar, misalnya karena adanya penambahan bangunan, renovasi, atau perubahan kepemilikan. Pembaruan data penting dilakukan agar nilai pajak yang tertera di SPPT sesuai dengan kondisi terkini.',
            'tags' => ['pbb','update','data pajak'],
            'syarat' => ['KTP'],
            'langkah' => [
                'Ajukan permohonan perubahan data PBB ke kantor kelurahan dengan menjelaskan perubahan yang terjadi',
                'Petugas memperbarui data objek pajak sesuai kondisi terbaru di lapangan',
            ],
        ],

        [
            'slug' => 'pbb-penghapusan',
            'judul' => 'Penghapusan PBB',
            'url' => '/layanan/pbb-penghapusan',
            'deskripsi' => 'Layanan Penghapusan PBB digunakan untuk menghapus objek pajak dari sistem PBB, misalnya karena bangunan telah dibongkar, terjadi bencana, atau terdapat data ganda dalam sistem. Penghapusan diperlukan agar wajib pajak tidak terus ditagihkan atas objek yang sudah tidak relevan.',
            'tags' => ['pbb','hapus pajak','tanah'],
            'syarat' => ['KTP'],
            'langkah' => [
                'Ajukan permohonan penghapusan PBB ke kantor kelurahan disertai alasan dan dokumen pendukung',
                'Petugas melakukan verifikasi kondisi objek pajak sebelum penghapusan diproses',
            ],
        ],

        [
            'slug' => 'pbb-penggabungan',
            'judul' => 'Penggabungan PBB',
            'url' => '/layanan/pbb-penggabungan',
            'deskripsi' => 'Layanan Penggabungan PBB digunakan untuk menggabungkan dua atau lebih objek pajak yang berdekatan menjadi satu objek pajak tunggal. Layanan ini biasanya diperlukan ketika seseorang memiliki beberapa bidang tanah yang saling berhubungan dan ingin disatukan pengelolaannya.',
            'tags' => ['pbb','gabung tanah','pajak'],
            'syarat' => ['KTP'],
            'langkah' => [
                'Ajukan permohonan penggabungan PBB ke kantor kelurahan dengan melampirkan data seluruh objek pajak yang akan digabung',
                'Petugas memproses penggabungan dan menerbitkan NOP serta SPPT baru atas objek yang telah digabungkan',
            ],
        ],

    ],

];
