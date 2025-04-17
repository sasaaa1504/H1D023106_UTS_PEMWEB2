<!-- views/peminjaman/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Peminjaman Barang</h2>

        <!-- Menampilkan pesan sukses atau error -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Tabel Daftar Peminjaman -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($peminjaman as $pinjam): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $pinjam->nama_peminjam; ?></td>
                        <td><?php echo $pinjam->nama_barang; ?></td>
                        <td><?php echo $pinjam->jumlah; ?></td>
                        <td><?php echo $pinjam->tanggal_pinjam; ?></td>
                        <td><?php echo $pinjam->tanggal_kembali; ?></td>
                        <td><?php echo ucfirst($pinjam->status); ?></td>
                        <td>
                            <?php if ($pinjam->status == 'dipinjam'): ?>
                                <a href="<?php echo site_url('peminjaman/kembalikan/'.$pinjam->id.'/'.$pinjam->id_barang.'/'.$pinjam->jumlah); ?>" class="btn btn-success btn-sm">Kembalikan</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
