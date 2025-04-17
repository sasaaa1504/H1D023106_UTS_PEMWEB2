<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f4f4f4; }
        form input, form select, form button {
            padding: 8px;
            margin: 5px 0;
        }
        form {
            background-color: #f9f9f9;
            padding: 15px;
            width: 100%;
            max-width: 600px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Manajemen Barang</h1>

    <form method="post" action="<?= site_url('barang/simpan'); ?>">
        <h3>Tambah Barang</h3>
        <label>Nama Barang</label><br>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required><br>

        <label>Kategori</label><br>
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Stok</label><br>
        <input type="number" name="stok" placeholder="Stok" required><br>

        <label>Keterangan</label><br>
        <input type="text" name="keterangan" placeholder="Keterangan"><br>

        <button type="submit">Tambah</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($barang)): ?>
                <?php $no = 1; foreach ($barang as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b->nama_barang ?></td>
                    <td><?= $b->nama_kategori ?></td>
                    <td><?= $b->stok ?></td>
                    <td><?= $b->keterangan ?></td>
                    <td>
                        <a href="<?= site_url('barang/edit/'.$b->id_barang); ?>">Edit</a> |
                        <a href="<?= site_url('barang/delete/'.$b->id_barang); ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Belum ada data barang.</td>
                </tr>
                <td><?php echo $row->status; ?></td>

            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
