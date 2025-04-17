<html>
<head>
	<title>Formulir Peminjaman Barang</title>
</head>
<body>
h1>Laporan Peminjaman Barang</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah Peminjaman</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $l): ?>
        <tr>
            <td><?php echo $l->nama_barang; ?></td>
            <td><?php echo $l->jumlah_peminjaman; ?></td>
            <td><?php echo $l->tanggal_pinjam; ?></td>
            <td><?php echo $l->tanggal_kembali ? $l->tanggal_kembali : '-'; ?></td>
            <td>
                <?php if (!$l->tanggal_kembali): ?>
                    <a href="<?php echo site_url('peminjaman/return_item/' . $l->id_peminjaman); ?>" class="btn btn-success">Kembalikan</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
