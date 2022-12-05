<?php
include "../database/koneksi.php";

#menghapus data produk berdasarkan id
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
	$fotoproduk = $pecah['foto_produk'];
	if (file_exists("../foto_produk/$fotoproduk")) {
		unlink("../foto_produk/$fotoproduk");
	}
	$koneksi->query("DELETE FROM produk WHERE id_produk = '$id'");
	$_SESSION['sukses'] = "Data Produk Berhasil Dihapus";
	echo "<script>location='index.php?hal=produk';</script>";
}
?>

// $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
// $pecah = $ambil->fetch_assoc();
// $fotoproduk = $pecah['foto_produk'];
// if (file_exists("../foto_produk/$fotoproduk")) {
// unlink("../foto_produk/$fotoproduk");
// }

// $koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");