<div class="search-container">
    <form method="GET" action="?page=appointment">
        <input type="hidden" name="page" value="appointment">
        <input type="text" name="search" placeholder="Cari nama pasien atau dokter..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <button type="submit">Cari</button>
    </form>
</div>

<h3>Daftar Appointment</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Pasien</th>
        <th>Dokter</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Keluhan</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $appointmentList = isset($_GET['search']) ? $appointment->searchAppointments($_GET['search']) : $appointment->getAllAppointments();
    if (count($appointmentList) > 0):
        foreach ($appointmentList as $a): 
    ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['nama_pasien'] ?></td>
        <td><?= $a['nama_dokter'] ?></td>
        <td><?= date('d-m-Y', strtotime($a['tanggal'])) ?></td>
        <td><?= date('H:i', strtotime($a['waktu'])) ?></td>
        <td><?= $a['keluhan'] ?></td>
        <td>
            <a href="?page=appointment&action=edit&id=<?= $a['id'] ?>">Edit</a> | 
            <a href="?page=appointment&action=delete&id=<?= $a['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus appointment ini?')">Hapus</a>
        </td>
    </tr>
    <?php 
        endforeach; 
    else: 
    ?>
    <tr>
        <td colspan="7" class="text-center">Tidak ada data appointment</td>
    </tr>
    <?php endif; ?>
</table>

<a href="?page=appointment&action=add" class="button">Buat Appointment Baru</a>
