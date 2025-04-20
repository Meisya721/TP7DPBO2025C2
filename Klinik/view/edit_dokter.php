<?php
$dokterData = $dokter->getDokterById($_GET['id']);
if (!$dokterData) {
    echo "Dokter tidak ditemukan.";
    exit;
}
?>

<h3>Edit Dokter</h3>
<form method="POST" action="?page=dokter&action=update">
    <input type="hidden" name="id" value="<?= $dokterData['id'] ?>">
    <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $dokterData['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label>Spesialisasi:</label>
        <input type="text" name="spesialisasi" value="<?= $dokterData['spesialisasi'] ?>" required>
    </div>
    <div class="form-group">
        <label>Jadwal Praktek:</label>
        <input type="text" name="jadwal_praktek" value="<?= $dokterData['jadwal_praktek'] ?>" required>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= $dokterData['telepon'] ?>">
    </div>
    <button type="submit">Perbarui</button>
    <a href="?page=dokter" class="button button-secondary">Batal</a>
</form>