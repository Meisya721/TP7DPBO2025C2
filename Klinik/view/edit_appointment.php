<?php
$appointmentData = $appointment->getAppointmentById($_GET['id']);
if (!$appointmentData) {
    echo "Appointment tidak ditemukan.";
    exit;
}
?>

<h3>Edit Appointment</h3>
<form method="POST" action="?page=appointment&action=update">
    <input type="hidden" name="id" value="<?= $appointmentData['id'] ?>">
    <div class="form-group">
        <label>Pasien:</label>
        <select name="pasien_id" required>
            <option value="">-- Pilih Pasien --</option>
            <?php foreach ($pasien->getAllPasien() as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $appointmentData['pasien_id'] == $p['id'] ? 'selected' : '' ?>><?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Dokter:</label>
        <select name="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            <?php foreach ($dokter->getAllDokter() as $d): ?>
                <option value="<?= $d['id'] ?>" <?= $appointmentData['dokter_id'] == $d['id'] ? 'selected' : '' ?>><?= $d['nama'] ?> (<?= $d['spesialisasi'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $appointmentData['tanggal'] ?>" required>
    </div>
    <div class="form-group">
        <label>Waktu:</label>
        <input type="time" name="waktu" value="<?= $appointmentData['waktu'] ?>" required>
    </div>
    <div class="form-group">
        <label>Keluhan:</label>
        <textarea name="keluhan" rows="3"><?= $appointmentData['keluhan'] ?></textarea>
    </div>
    <button type="submit">Perbarui</button>
    <a href="?page=appointment" class="button button-secondary">Batal</a>
</form>