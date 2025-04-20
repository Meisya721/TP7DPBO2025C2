<h3>Buat Appointment Baru</h3>
<form method="POST" action="?page=appointment&action=save">
    <div class="form-group">
        <label>Pasien:</label>
        <select name="pasien_id" required>
            <option value="">-- Pilih Pasien --</option>
            <?php foreach ($pasien->getAllPasien() as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Dokter:</label>
        <select name="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            <?php foreach ($dokter->getAllDokter() as $d): ?>
                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?> (<?= $d['spesialisasi'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>
    </div>
    <div class="form-group">
        <label>Waktu:</label>
        <input type="time" name="waktu" required>
    </div>
    <div class="form-group">
        <label>Keluhan:</label>
        <textarea name="keluhan" rows="3"></textarea>
    </div>
    <button type="submit">Simpan</button>
    <a href="?page=appointment" class="button button-secondary">Batal</a>
</form>