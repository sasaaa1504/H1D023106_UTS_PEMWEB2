<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
</head>
<body>
    <h1>Laporan Peminjaman Barang</h1>

    <form method="get" action="<?= site_url('laporan'); ?>">
        <label>Filter Tanggal Pinjam:</label>
        <input type="date" name="start">
        <input type="date" name="end">
        <button type="submit">Filter</button>
    </form>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
        </tr>
        <?php $no=1; foreach ($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama_barang ?></td>
            <td><?= $row->jumlah_peminjaman ?></td>
            <td><?= $row->tanggal_pinjam ?></td>
            <td><?= $row->tanggal_kembali ?? '-' ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
