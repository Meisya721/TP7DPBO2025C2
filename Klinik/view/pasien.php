<div class="search-container">
    <form method="GET" action="?page=pasien">
        <input type="hidden" name="page" value="pasien">
        <input type="text" name="search" placeholder="Cari nama atau alamat..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <button type="submit">Cari</button>
    </form>
</div>

<h3>Daftar Pasien</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Usia</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $pasienList = isset($_GET['search']) ? $pasien->searchPasien($_GET['search']) : $pasien->getAllPasien();
    if (count($pasienList) > 0):
        foreach ($pasienList as $p): 
    ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['usia'] ?></td>
        <td><?= $p['alamat'] ?></td>
        <td><?= $p['telepon'] ?></td>
        <td>
            <a href="?page=pasien&action=edit&id=<?= $p['id'] ?>">Edit</a> | 
            <a href="?page=pasien&action=delete&id=<?= $p['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Hapus</a>
        </td>
    </tr>
    <?php 
        endforeach; 
    else: 
    ?>
    <tr>
        <td colspan="6" class="text-center">Tidak ada data pasien</td>
    </tr>
    <?php endif; ?>
</table>

<a href="?page=pasien&action=add" class="button"> + Tambah Pasien</a>
