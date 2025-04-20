<h3>Tambah Dokter Baru</h3>
<form method="POST" action="?page=dokter&action=save">
    <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" required>
    </div>
    <div class="form-group">
        <label>Jadwal Praktek:</label>
        <input type="text" name="jadwal_praktek" required>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon">
    </div>
    <button type="submit">Simpan</button>
    <a href="?page=dokter" class="button button-secondary">Batal</a>
</form>