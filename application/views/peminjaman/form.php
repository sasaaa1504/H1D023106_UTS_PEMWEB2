<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<h2>Form Tambah Peminjaman</h2>

<?php if ($this->session->flashdata('error')): ?>
    <div style="color:red;">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('peminjaman/simpan') ?>" method="post">

    <label>Nama Peminjam</label>
    <input type="text" name="nama_peminjam" required><br><br>

    <label>Barang</label>
    <select name="id_barang" required>
        <option value="">-- Pilih Barang --</option>
        <?php foreach ($barang as $b): ?>
            <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?> (Stok: <?= $b->stok ?>)</option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Jumlah</label>
    <input type="number" name="jumlah" min="1" required><br><br>

    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required><br><br>

    <label>Tanggal Kembali</label>
    <input type="date" name="tanggal_kembali" required><br><br>

    <button type="submit">Simpan</button>
</form>
</div>

</body>
</html>
