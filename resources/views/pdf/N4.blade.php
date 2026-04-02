<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen N4</title>
</head>
<body>
    <div class="container " style="font-family: 'Times New Roman', Times, serif;font-size:10pt;word-wrap: break-word;">
        <div class="header" style=" ">
            <p style="margin: 0;">Lampiran VIII</p>
            <p style="margin: 0;">Keputusan Dirjen Bimas Islam No 473 Tahun 2020</p>
            <p style="text-align: center;">FORMULIR PERSETUJUAN CALON PENGANTIN</p>
            <p style="text-align: end;font-weight: bold;">Model N 4</p>
            <p style="text-align: center;">
                <span style="font-weight: bold; border-bottom:1px solid #000; padding-bottom:2px;">
                  PERSETUJUAN CALON PENGANTIN
                </span>
            </p>
        </div>
        <div class="table">
            <p>Yang bertanda tangan di bawah ini :</p>
            <table>
                <tr>
                    <td>A</td>
                    <td>Calon Suami :</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $suami->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $suami->ayah->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $suami->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $suami->tempat_lahir }}, {{ $suami->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $suami->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agama</td>
                    <td>:</td>
                    <td>{{ $suami->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $suami->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
                    <td>:</td>
                    <td>{{ $suami->alamat }}</td>
                </tr>
                <tr style="height: 20px;"></tr>
                <tr >
                    <td>B</td>
                    <td>Calon Istri :</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $istri->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $istri->ayah->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $istri->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $istri->tempat_lahir }}, {{ $istri->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $istri->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agama</td>
                    <td>:</td>
                    <td>{{ $istri->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $istri->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
                    <td>:</td>
                    <td>{{ $istri->alamat }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa paksaan dari siapapun
juga, setuju untuk melangsungkan pernikahan.</p>
            <p>
                Demikianlah surat persetujuan ini dibuat untuk digunakan seperlunya.
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 30%;"></td>
                    <td style="width: 40%;"></td>
                    <td style="width: 30%; text-indent: 20px;">Jambi,{{ $todaydate }}</td>
                </tr>
                <tr >
                    <td style="text-align: center;">Calon Suami</td>
                    <td></td>
                    <td style="text-align: center;">Calon Istri</td>
                </tr>
                <tr style="height: 200px;">
                    <td style="text-align: center;">{{ $suami->nama }}</td>
                    <td></td>
                    <td style="text-align: center;">{{ $istri->nama }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
