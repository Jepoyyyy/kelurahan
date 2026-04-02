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
                            <option value="Laki-laki">Pria</option>
                            <option value="Perempuan">Wanita</option>
                        </x-dropdown>
                    </div>
            <div class="form-group lg:col-span-1">
                        <label for="Tanggalpemohon" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="Tanggalpemohon" name="Tanggalpemohon"
                        class="form-control" required>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <label for="Tempatpemohon" class="form-label">Tempat Lahir</label>
                        <input type="text" id="Tempatpemohon" name="Tempatpemohon"
                        class="form-control" placeholder="Contoh: Jakarta, 15 Mei 1990" required>
                    </div>

                </div>
                <div class="form-section">
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
                <div class="form-group">
                    <label class="form-label">Status Perkawinan Saat Ini</label>
                    <x-dropdown name="status" id="status" class="form-control">
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
