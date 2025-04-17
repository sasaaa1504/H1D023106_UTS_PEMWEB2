<!-- views/peminjaman/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Barang</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Peminjaman Barang</h2>

        <!-- Menampilkan pesan error atau sukses -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('peminjaman/simpan'); ?>

        <div class="form-group">
            <label for="nama_peminjam">Nama Peminjam:</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?php echo set_value('nama_peminjam'); ?>">
            <?php echo form_error('nama_peminjam', '<div class="text-danger">', '</div>'); ?>
        </div>

        <!-- Input teks manual untuk nama barang -->
        <div class="form-group">
            <label for="id_barang">Barang:</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo set_value('id_barang'); ?>" placeholder="Masukkan ID Barang">
            <?php echo form_error('id_barang', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo set_value('jumlah'); ?>" min="1">
            <?php echo form_error('jumlah', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo set_value('tanggal_pinjam'); ?>">
            <?php echo form_error('tanggal_pinjam', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali:</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo set_value('tanggal_kembali'); ?>">
            <?php echo form_error('tanggal_kembali', '<div class="text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Pinjam Barang</button>
        <?php echo form_close(); ?>
    </div>
</body>
</html>
