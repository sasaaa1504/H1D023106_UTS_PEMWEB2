<!DOCTYPE html>
<html>
<head><title>Laporan Peminjaman</title></head>
<body>
    <h2>Laporan Barang Dipinjam</h2>

    <form method="post" action="<?= site_url('peminjaman/laporan') ?>">
        <label>Tanggal Awal</label>
        <input type="date" name="tanggal_awal" required value="<?= isset($tanggal_awal) ? $tanggal_awal : '' ?>">
        
        <label>Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" required value="<?= isset($tanggal_akhir) ? $tanggal_akhir : '' ?>">

        <button type="submit" name="filter">Filter</button>
    </form>

    <br>

    <a href="<?= site_url('peminjaman') ?>">Kembali ke Daftar Peminjaman</a>
    
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
        <?php if (!empty($peminjaman)): $no = 1; foreach ($peminjaman as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $p->nama_barang ?></td>
            <td><?= $p->nama_peminjam ?></td>
            <td><?= $p->tanggal_pinjam ?></td>
            <td><?= $p->tanggal_kembali ?></td>
            <td><?= $p->jumlah ?></td>
            <td><?= $p->status ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="7">Belum ada data.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
