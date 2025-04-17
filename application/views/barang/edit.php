<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2>Form Edit Barang</h2>
    <form method="post" action="<?= site_url('barang/update/'.$barang->id_barang) ?>">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= $barang->nama_barang ?>" required><br><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>" <?= $barang->kategori_id == $k->id_kategori ? 'selected' : '' ?>>
                    <?= $k->nama_kategori ?>
                </option>
            <?php endforeach ?>
        </select><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= $barang->stok ?>" required><br><br>

        <label>Keterangan:</label><br>
        <textarea name="keterangan"><?= $barang->keterangan ?></textarea><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="<?= site_url('barang') ?>">← Kembali</a>
</body>
</html>
