<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen N 5</title>
</head>
<body>
        <div class="container " style="font-family: 'Times New Roman', Times, serif;font-size:10pt;word-wrap: break-word;">
            <div class="header" style=" ">
                <p style="margin: 0;">Lampiran VIII</p>
                <p style="margin: 0;">Keputusan Dirjen Bimas Islam No 473 Tahun 2020</p>
                <p style="text-align: center;margin: 0;">FORMULIR SURAT IZIN ORANG TUA</p>
                <p style="text-align: end;font-weight: bold;margin:0;">Model N 5</p>
                <p style="text-align: center;margin:0;">
                    <span style="font-weight: bold; border-bottom:1px solid #000; padding-bottom:2px;">
                    SURAT IZIN ORANG TUA
                    </span>
                </p>
            </div>
            <div class="table">
                <p style="font-weight: bold;margin:0;padding-top: 15px;">Yang Bertanda Tangan di Bawah Ini :</p>
            </div>
            <table>
                <tr>
                    <td>A</td>
                    <td>1.</td>
                    <td>Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $ayah->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.</td>
                    <td>Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $ayah->namaayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $ayah->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.</td>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $ayah->tempatlahir }}, {{ $ayah->tanggallahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $ayah->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $ayah->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $ayah->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $ayah->alamat}}</td>
                </tr>
                <tr style="height: 10px;"></tr>
                <tr>
                    <td>B</td>
                    <td>1.</td>
                    <td>Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $ibu->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.</td>
                    <td>Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $ibu->namaayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $ibu->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.</td>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $ibu->tempatlahir }}, {{ $ayah->tanggallahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $ibu->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $ibu->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $ibu->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $ibu->alamat}}</td>
                </tr>
            </table>
            <p style="font-weight: bold;margin:0;padding-top: 10px;">Adalah ayah kandung dan ibu kandung dari :</p>
            <table>
                <tr ></tr>
                <tr>
                    <td></td>
                    <td>1.</td>
                    <td>Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $pemohon->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.</td>
                    <td>Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $ayah->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $pemohon->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.</td>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $pemohon->tempatlahir }}, {{ $pemohon->tanggallahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $pemohon->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $pemohon->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $pemohon->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $pemohon->alamat}}</td>
                </tr>
            </table>
            <p style="font-weight: bold;margin:0;padding-top: 10px;">Memberi izin kepada anak kami untuk melakukan pernikahan dengan :</p>
            <table>
                <tr>
                    <td>&nbsp;</td>
                    <td>1.</td>
                    <td>Nama Lengkap dan Alias</td>
                    <td>:</td>
                    <td>{{ $suami->nama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>2.</td>
                    <td>Bin/Binti</td>
                    <td>:</td>
                    <td>{{ $suami->namaayah }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>3.</td>
                    <td>Nomor Induk Kependudukan</td>
                    <td>:</td>
                    <td>{{ $suami->nik }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>4.</td>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $suami->tempatlahir }}, {{ $suami->tanggallahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>5.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ $suami->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>6.</td>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $suami->agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>7.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $suami->pekerjaan }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>8.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $suami->alamat}}</td>
                </tr>
            </table>
            <div class="footer">
                <p>Demikianlah surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun dan untuk dipergunakan seperlunya. </p>
            </div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 30%;"></td>
                    <td style="width: 40%;"></td>
                    <td style="width: 30%; text-indent: 20px;">Jambi,{{ $todaydate }}</td>
                </tr>
                <tr >
                    <td style="text-align: center;">Ayah</td>
                    <td></td>
                    <td style="text-align: center;">Ibu</td>
                </tr>
                <tr style="height: 100px;"></tr>
                <tr >
                    <td style="text-align: center;">{{ $ayah->nama }}</td>
                    <td></td>
                    <td style="text-align: center;">{{ $ibu->nama }}</td>
                </tr>
            </table>
        </div>
</body>
</html>
