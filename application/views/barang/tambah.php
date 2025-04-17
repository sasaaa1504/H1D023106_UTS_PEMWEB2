<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Form Tambah Barang</h2>
    <form method="post" action="<?= site_url('barang/simpan') ?>">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>

        <label>Kategori:</label><br>
        <select name="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
            <?php endforeach ?>
        </select><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>

        <label>Keterangan:</label><br>
        <textarea name="keterangan"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="<?= site_url('barang') ?>">← Kembali</a>
</body>
</html>
