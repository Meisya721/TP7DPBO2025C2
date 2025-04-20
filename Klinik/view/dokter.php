<div class="search-container">
    <form method="GET" action="?page=dokter">
        <input type="hidden" name="page" value="dokter">
        <input type="text" name="search" placeholder="Cari nama atau spesialisasi..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <button type="submit">Cari</button>
    </form>
</div>

<h3>Daftar Dokter</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Spesialisasi</th>
        <th>Jadwal Praktek</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $dokterList = isset($_GET['search']) ? $dokter->searchDokter($_GET['search']) : $dokter->getAllDokter();
    if (count($dokterList) > 0):
        foreach ($dokterList as $d): 
    ?>
    <tr>
        <td><?= $d['id'] ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['spesialisasi'] ?></td>
        <td><?= $d['jadwal_praktek'] ?></td>
        <td><?= $d['telepon'] ?></td>
        <td>
            <a href="?page=dokter&action=edit&id=<?= $d['id'] ?>">Edit</a> | 
            <a href="?page=dokter&action=delete&id=<?= $d['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">Hapus</a>
        </td>
    </tr>
    <?php 
        endforeach; 
    else: 
    ?>
    <tr>
        <td colspan="6" class="text-center">Tidak ada data dokter</td>
    </tr>
    <?php endif; ?>
</table>

<a href="?page=dokter&action=add" class="button"> + Tambah Dokter</a>
