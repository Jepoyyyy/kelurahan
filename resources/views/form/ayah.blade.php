    <div class="form-grid">
         <div class="form-group">
            <label for="namaayah" class="form-label">Nama Lengkap dan Alias</label>
            <input type="text" id="namaayah" name="namaayah"
                               class="form-control" placeholder="Nama lengkap sesuai KTP" required>
        </div>

            <div class="form-group">
                        <label for="NIKayah" class="form-label">NIK</label>
                        <input type="text" id="NIKayah" name="NIKayah" maxlength="16"
                        class="form-control" placeholder="16 digit NIK" required>
            </div>
                    <div class="form-group lg:col-span-2">
                        <label for="TempatLayah" class="form-label">Tempat Lahir</label>
                        <input type="text" id="TempatLayah" name="TempatLayah"
                        class="form-control" placeholder="Contoh: Jakarta, 15 Mei 1990" required>
                    </div>
                    <div class="form-group lg:col-span-1">
                        <label for="TanggalLayah" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="TanggalLayah" name="TanggalLayah"
                        class="form-control" required>
                    </div>
                </div>

                <!-- Section 2: Data Pribadi -->
                <div class="form-section">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-8">Data Pribadi</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="WNayah" class="form-label">Kewarganegaraan</label>
                            <input type="text" id="WNayah" name="WNayah"
                            class="form-control" placeholder="WNI / WNA" required>
                    </div>

                    <div class="form-group">
                        <label for="Agamaayah" class="form-label">Agama</label>
                        <input type="text" id="Agamaayah" name="Agamaayah"
                               class="form-control" placeholder="Islam / Kristen / Katolik / Hindu / Buddha / Konghucu" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group lg:col-span-2">
                        <label for="Pekerjaanayah" class="form-label">Pekerjaan</label>
                        <input type="text" id="Pekerjaanayah" name="Pekerjaanayah"
                        class="form-control" placeholder="Contoh: Karyawan Swasta, Wiraswasta, PNS" required>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <div>
                            <label for="Alamatayah" class="form-label">Alamat Lengkap</label>
                        <input type="text" id="Alamatayah" name="Alamatayah"
                        class="form-control" placeholder="Alamat sesuai KTP" required>
                        <div>
                            <label for="RTayah" class="form-label">RT</label>
                            <input type="text" name="RTayah" class="form-control" required>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
