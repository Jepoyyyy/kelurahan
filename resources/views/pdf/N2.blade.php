<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen N2</title>
</head>
<body>
    <div class="container">
        <div class="header" style=" ">
            <p style="margin: 0;">Lampiran IV</p>
            <p style="margin: 0;">Keputusan Dirjen Bimas Islam No 473 Tahun 2020</p>
        </div>
        <div class="letter-head">
            <div style="text-align: center; font-weight: bold ;margin:1rem 0">FORMULIR PERMOHONAN KEHENDAK NIKAH</div>
            <div style="text-align: end; font-weight: bold;">Model N 2</div>
            <table style="width:100%;">
            <tr>
                <td>Perihal&nbsp;&nbsp;&nbsp;&nbsp;: Permohonan Kehendak Nikah</td>
                <td style="text-align:right;">Jambi, {{ $todaydate }}</td>
            </tr>
            </table>
            <div style="margin:1rem 0">
                Kepada Yth. <br>
                Kepala .............................<br>
                Di Tempat
            </div>
        </div>
        <div class="subjek">
            <p>Dengan hormat, kami mengajukan permohonan kehendak nikah untuk atas nama :</p>
            <table>
                <tr>
                    <td>Calon Suami</td>
                    <td>:</td>
                    <td>{{ $calon_suami }}</td>
                </tr>
                <tr>
                    <td>Calon Istri</td>
                    <td>:</td>
                    <td>{{ $calon_istri }}</td>
                </tr>
                <tr>
                    <td>Hari/Tanggal/Jam</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tempat Akad Nikah&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
            <p style="text-indent: 40px;">Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut:</p>
            <table>
                <tr>
                    <td>1.</td>
                    <td>Surat Pengantar nikah dari Desa/Kelurahan (N1)</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Persetujuan Calon Mempelai (N4)</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Fotokopi KTP Calon Mempelai, Wali, dan Saksi</td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Fotokopi Akta Kelahiran/Ijazah</td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Fotokopi Kartu Keluarga</td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>Pasfoto 2 x 3 = 5 lembar, 3 x 4 = 2 lembar, 4 x 6 = 1 lembar, berlatar belakang biru</td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>......................................................................</td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>......................................................................</td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>......................................................................</td>
                </tr>
            </table>
            <p style="text-indent: 40px;">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri, dan dicatat sesuai dengan
ketentuan perundang-undangan.</p>
        </div>
        <table style="width: 100%;">
            <tr>
                <td style="width: 70%;">Diterima tanggal .................................</td>
                <td style="width: 30%;">Wassalam,</td>
            </tr>
            <tr>
                <td>Yang menerima, </td>
                <td>Pemohon</td>
            </tr>
            <tr>
                <td>Kepala…………………………</td>
                <td></td>
            </tr>
            <tr>
                <td style="height:90px;"></td>
                <td></td>
            </tr>
            <tr>
                <td>.............................................</td>
                <td>{{ $pemohon->nama }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
