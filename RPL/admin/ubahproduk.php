<h2>Ubah Produk</h2>

<?php
include "../database/koneksi.php";

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Foto</label><br>
        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Stok Buku</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Letak File : </label><br>
        <label><?php echo $pecah['resep_produk']; ?></label>
    </div>
    <div class="form-group">
        <label>Ganti File</label>
        <input type="file" class="form-control" name="resep">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php

if (isset($_POST['ubah'])) {
	//foto
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];


	//jika foto diubah
	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk = '$_GET[id]'");
		$_SESSION['pesan'] = 'Produk berhasil diubah';
	}

	//-----------------------------------------------------------------------
	//file resep
	$namaresep = $_FILES['resep']['name'];
	$lokasiresep = $_FILES['resep']['tmp_name'];

	//jika file diubah
	if (!empty($lokasiresep)) {
		move_uploaded_file($lokasiresep, "../resep_produk/$namaresep");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', resep_produk='$namaresep', stok_produk='$_POST[stok]' WHERE id_produk = '$_GET[id]'");
		$_SESSION['pesan'] = 'Produk berhasil diubah';
	}

	#cek apakah ada informasi yang diubah
	if ($_POST['nama'] == $pecah['nama_produk'] && $_POST['harga'] == $pecah['harga_produk'] && $_POST['berat'] == $pecah['berat_produk'] && $_POST['stok'] == $pecah['stok_produk'] && $_POST['deskripsi'] == $pecah['deskripsi_produk']) {
		$_SESSION['pesan'] = 'Tidak ada informasi yang diubah';
	} else {
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', resep_produk='$namaresep', stok_produk='$_POST[stok]' WHERE id_produk = '$_GET[id]'");
		$_SESSION['pesan'] = 'Produk berhasil diubah';
	}

	// echo "<script> alert('Produk Terubah'); </script>";
	echo "<script> location='index.php?hal=produk'; </script>";
}
?>