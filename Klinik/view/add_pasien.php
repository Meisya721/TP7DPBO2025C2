<h3>Tambah Pasien Baru</h3>
<form method="POST" action="?page=pasien&action=save">
    <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label>Usia:</label>
        <input type="number" name="usia" required>
    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="alamat" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon">
    </div>
    <button type="submit">Simpan</button>
    <a href="?page=pasien" class="button button-secondary">Batal</a>
</form>