{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemohon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen pt-9 ">
<div class="form-wrapper">
        <!-- Header Sederhana -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-semibold text-gray-900 mb-2">
                Form Pengantar Nikah
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Isi data dengan lengkap dan benar untuk keperluan pengantar nikah
            </p>
        </div>
            <!-- Multi Tab button -->
    <div class="tabs-container">
        <div class="tab-item">
            <div class="border w-5 h-5 rounded-full">
            </div>
            <h3>Identitas Pemohon</h3>
            </div>
        <div class="tab-item">
            <div class="border w-5 h-5 rounded-full">
            </div>
            <h3>Identitas Ayah</h3></div>
        <div class="tab-item">
            <div class="border w-5 h-5 rounded-full">
            </div>
            <h3>Identitas Ibu</h3>
        </div>
    </div> --}}
    {{-- Form Identitas Pemohon --}}
    {{-- form pemohon --}}
{{-- <form action="{{ route('form.pemohon.post') }}" method="POST" class=" mx-auto">
    @csrf --}}
    {{-- Form Identitas Pemohon --}}
    <div class="form-grid">
         <div class="form-group">
            <label for="namapemohon" class="form-label">Nama Lengkap</label>
            <input type="text" id="namapemohon" name="namapemohon"
                               class="form-control" placeholder="Nama lengkap sesuai KTP" required>
        </div>

            <div class="form-group">
                        <label for="NIKpemohon" class="form-label">NIK</label>
                        <input type="text" id="NIKpemohon" name="NIKpemohon" maxlength="16"
                        class="form-control" placeholder="16 digit NIK" required>
            </div>

            <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <x-dropdown name="gender" id="gender" class="form-control">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L">Pria</option>
                            <option value="P">Wanita</option>
                        </x-dropdown>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <label for="Tempatpemohon" class="form-label">Tempat Lahir</label>
                        <input type="text" id="Tempatpemohon" name="Tempatpemohon"
                        class="form-control" placeholder="Contoh: Jakarta, 15 Mei 1990" required>
                    </div>
                    <div class="form-group lg:col-span-1">
                        <label for="Tanggalpemohon" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="Tanggalpemohon" name="Tanggalpemohon"
                        class="form-control" required>
                    </div>
                </div>


                <!-- Section 2: Data Pribadi -->
                <div class="form-section">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-8">Data Pribadi</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="WNpemohon" class="form-label">Kewarganegaraan</label>
                            <input type="text" id="WNpemohon" name="WNpemohon"
                            class="form-control" placeholder="WNI / WNA" required>
                    </div>

                    <div class="form-group">
                        <label for="Agamapemohon" class="form-label">Agama</label>
                        <input type="text" id="Agamapemohon" name="Agamapemohon"
                               class="form-control" placeholder="Islam / Kristen / Katolik / Hindu / Buddha / Konghucu" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group lg:col-span-2">
                        <label for="Pekerjaanpemohon" class="form-label">Pekerjaan</label>
                        <input type="text" id="Pekerjaanpemohon" name="Pekerjaanpemohon"
                        class="form-control" placeholder="Contoh: Karyawan Swasta, Wiraswasta, PNS" required>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <div>
                            <label for="Alamatpemohon" class="form-label">Alamat Lengkap</label>
                        <input type="text" id="Alamatpemohon" name="Alamatpemohon"
                        class="form-control" placeholder="Alamat sesuai KTP" required>
                        <div>
                            <label for="rtpemohon" class="form-label">RT</label>
                            <input type="text" name="rtpemohon" class="form-control" required>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-section">
                <h2 class="text-2xl font-semibold text-gray-900 mb-8">Status Perkawinan</h2>

                <div class="form-group">
                    <label class="form-label">Status Perkawinan Saat Ini</label>
                    <x-dropdown name="letter_type" id="letter_type" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin Terlebih Dahulu --</option>
                    </x-dropdown>
                </div>

                <div class=" form-group jumlahistri hidden">
                    <label for="beristrike" class="form-label">
                        beristri Ke :
                    </label>
                    <input type="text" id="beristrike" name="beristrike"
                    class="form-control" placeholder="3">
                </div>
            </div>
            <div class="form-group partnersebelumnya hidden">
                <label for="namapartnersebelumnyapemohon" class="form-label">
                    Nama Pasangan Sebelumnya
                </label>
                    <input type="text" id="namapartnersebelumnyapemohon" name="namapartnersebelumnyapemohon"
                    class="form-control" >
                </div>

                <!-- Submit -->
                {{-- <div class="pt-12">
                    <button type="route" class="btn-primary">
                        Next
                    </button>
                </div> --}}
            {{-- </form> --}}
{{-- </div>
</div>
</body>
</html> --}}
