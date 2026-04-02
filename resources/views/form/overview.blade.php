<div class="wrapper container">
    <div class="pemohonwrapper">
        <div class="overview-group p-4 border rounded-lg bg-white shadow-md">
            <h3>Data Pemohon</h3>

            <div class="overview-data">
                <label for="namapemohonov" class="overview-label">Nama:</label>
                <span id="namapemohonovdata" name="namapemohonovdata"class="overview-input" value="{{ $pemohon['namapemohon'] }}">
                    {{ $pemohon['namapemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="NIKpemohonov" class="overview-label">NIK:</label>
                <span id="NIKpemohonovdata" name="NIKpemohonovdata"class="overview-input" value="{{ $pemohon['NIKpemohon'] }}">
                    {{ $pemohon['NIKpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="genderpemohonov" class="overview-label">Gender:</label>
                <span id="genderpemohonovdata" name="genderpemohonovdata"class="overview-input" value="{{ $pemohon['gender'] }}">
                    {{ $pemohon['gender'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="Tanggalpemohonov" class="overview-label">Tanggal Lahir:</label>
                <span id="Tanggalpemohonovdata" name="Tanggalpemohonovdata"class="overview-input" value="{{ $pemohon['Tanggalpemohon'] }}">
                    {{ $pemohon['Tanggalpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="Tempatpemohonov" class="overview-label">Tempat Lahir:</label>
                <span id="Tempatpemohonovdata" name="Tempatpemohonovdata"class="overview-input" value="{{ $pemohon['Tempatpemohon'] }}">
                    {{ $pemohon['Tempatpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="WNpemohonov" class="overview-label">Kewarganegaraan:</label>
                <span id="WNpemohonovdata" name="WNpemohonovdata"class="overview-input" value="{{ $pemohon['WNpemohon'] }}">
                    {{ $pemohon['WNpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="Agamapemohonov" class="overview-label">Agama:</label>
                <span id="Agamapemohonovdata" name="Agamapemohonovdata"class="overview-input" value="{{ $pemohon['Agamapemohon'] }}">
                    {{ $pemohon['Agamapemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="Pekerjaanpemohonov" class="overview-label">Pekerjaan:</label>
                <span id="Pekerjaanpemohonovdata" name="Pekerjaanpemohonovdata"class="overview-input" value="{{ $pemohon['Pekerjaanpemohon'] }}">
                    {{ $pemohon['Pekerjaanpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="Alamatpemohonov" class="overview-label">Alamat:</label>
                <span id="Alamatpemohonovdata" name="Alamatpemohonovdata"class="overview-input" value="{{ $pemohon['Alamatpemohon'] }}{{ $pemohon['rtpemohon'] }}">
                    {{ $pemohon['Alamatpemohon'] }}, RT {{ $pemohon['rtpemohon'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="letter_typepemohonov" class="overview-label">Jenis Surat:</label>
                <span id="letter_typepemohonovdata" name="letter_typepemohonovdata"class="overview-input" value="{{ $pemohon['status'] }}">
                    {{ $pemohon['status'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="beristrikepemohonov" class="overview-label">Beristrike:</label>
                <span id="beristrikepemohonov" name="beristrikepemohonov"class="overview-input" value="{{ $pemohon['beristrike'] }}">
                    {{ $pemohon['beristrike'] }}
                </span>
            </div>
            <div class="overview-data">
                <label for="namapemohonov" class="overview-label">Nama Pemohon :</label>
                <span id="namapemohonov" name="namapemohonov"class="overview-input" value="{{ $pemohon['namapemohon'] }}">
                    {{ $pemohon['namapemohon'] }}
                </span>
            </div>
        </div>
    </div>

<div class="overview-group p-4 border rounded-lg bg-white shadow-md my-4">
    <h3>Data Ayah</h3>
    Nama: {{ $ayah['namaayah'] }} <br>
    NIK: {{ $ayah['NIKayah'] }}
</div>

<div class="overview-group p-4 border rounded-lg bg-white shadow-md">
    <h3>Data Ibu</h3>
    Nama: {{ $ibu['namaibu'] }} <br>
    NIK: {{ $ibu['NIKibu'] }}
</div>
<div class="overview-group p-4 border rounded-lg bg-white shadow-md">
    <h3>Data Pasangan</h3>
    Nama: {{ $pasangan['namapasangan'] }} <br>
    NIK: {{ $pasangan['NIKpasangan'] }}
</div>
</div>

