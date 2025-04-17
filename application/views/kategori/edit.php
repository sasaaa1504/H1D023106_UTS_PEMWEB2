<h2>Edit Kategori</h2>
<form method="post" action="<?= site_url('kategori/update/'.$kategori->id) ?>">
    <input type="text" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" required>
    <button type="submit">Update</button>
</form>
