<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="form-grup">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" required>
    </div>
    <div class="form-grup">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" required>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto" required>
    </div>
    <div class="form-grup">
        <label>Stok Produk</label>
        <input type="number" class="form-control" name="stok" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label>Cover Buku Tambahan</label>
        <input type="file" class="form-control" name="resep" required>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
include "../database/koneksi.php";

if (isset($_POST['save'])) {
    //foto
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasi, "../foto_produk/" . $nama);

    //file resep
    $namaresep = $_FILES['resep']['name'];
    $lokasiresep = $_FILES['resep']['tmp_name'];
    move_uploaded_file($lokasiresep, "../resep_produk/" . $namaresep);

    //input ke data base
    $koneksi->query("INSERT INTO produk 
			(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,resep_produk,stok_produk)
			VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$namaresep','$_POST[stok]')");

    $_SESSION['pesan'] = 'Data Produk Berhasil Ditambahkan';
    echo "<meta http-equiv='refresh' content='1;url=index.php?hal=produk'>";
}

?>