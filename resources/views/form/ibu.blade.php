    <div class="form-grid">
         <div class="form-group">
            <label for="namaibu" class="form-label">Nama Lengkap dan Alias</label>
            <input type="text" id="namaibu" name="namaibu"
                               class="form-control" placeholder="Nama lengkap sesuai KTP" required>
        </div>
        <div class="form-group">
            <label for="NIKibu" class="form-label">NIK</label>
            <input type="text" id="NIKibu" name="NIKibu" maxlength="16"
                        class="form-control" placeholder="16 digit NIK" required>
        </div>
        <div class="form-group lg:col-span-2">
            <label for="TempatLibu" class="form-label">Tempat Lahir</label>
            <input type="text" id="TempatLibu" name="TempatLibu"
                        class="form-control" placeholder="Contoh: Jakarta, 15 Mei 1990" required>
        </div>
        <div class="form-group lg:col-span-1">
            <label for="TanggalLibu" class="form-label">Tanggal Lahir</label>
            <input type="date" id="TanggalLibu" name="TanggalLibu"
                        class="form-control" required>
        </div>
                </div>

                <!-- Section 2: Data Pribadi -->
                <div class="form-section">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-8">Data Pribadi</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="WNibu" class="form-label">Kewarganegaraan</label>
                            <input type="text" id="WNibu" name="WNibu"
                            class="form-control" placeholder="WNI / WNA" required>
                    </div>

                    <div class="form-group">
                        <label for="Agamaibu" class="form-label">Agama</label>
                        <input type="text" id="Agamaibu" name="Agamaibu"
                               class="form-control" placeholder="Islam / Kristen / Katolik / Hindu / Buddha / Konghucu" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group lg:col-span-2">
                        <label for="Pekerjaanayah" class="form-label">Pekerjaan</label>
                        <input type="text" id="Pekerjaanibu" name="Pekerjaanibu"
                        class="form-control" placeholder="Contoh: Karyawan Swasta, Wiraswasta, PNS" required>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <div>
                            <label for="Alamatibu" class="form-label">Alamat Lengkap</label>
                        <input type="text" id="Alamatibu" name="Alamatibu"
                        class="form-control" placeholder="Alamat sesuai KTP" required>
                        <div>
                            <label for="RTibu" class="form-label">RT</label>
                            <input type="text" name="RTibu" class="form-control" required>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
