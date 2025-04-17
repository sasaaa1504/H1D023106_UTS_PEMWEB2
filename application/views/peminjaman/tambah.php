<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2>Form Tambah Peminjaman</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('peminjaman/simpan') ?>" method="post" class="mt-3">
        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_barang" class="form-label">Barang</label>
            <select name="id_barang" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                <?php foreach ($barang as $b): ?>
                    <option value="<?= $b->id_barang ?>">
                        <?= $b->nama_barang ?> (Stok: <?= $b->stok ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('peminjaman') ?>" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>
