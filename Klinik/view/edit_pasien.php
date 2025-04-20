<?php
$pasienData = $pasien->getPasienById($_GET['id']);
if (!$pasienData) {
    echo "Pasien tidak ditemukan.";
    exit;
}
?>

<h3>Edit Pasien</h3>
<form method="POST" action="?page=pasien&action=update">
    <input type="hidden" name="id" value="<?= $pasienData['id'] ?>">
    <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $pasienData['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label>Usia:</label>
        <input type="number" name="usia" value="<?= $pasienData['usia'] ?>" required>
    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <textarea name="alamat" rows="3"><?= $pasienData['alamat'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?= $pasienData['telepon'] ?>">
    </div>
    <button type="submit">Perbarui</button>
    <a href="?page=pasien" class="button button-secondary">Batal</a>
</form>