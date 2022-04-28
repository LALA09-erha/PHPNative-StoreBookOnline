<?php

	session_start();

	//ambil id
	$id_produk = $_GET['id'];
	//hapus
	unset($_SESSION['keranjang'][$id_produk]);
	//pesan
	echo "<script> alert('Produk Berhasil Dihapus'); </script>";
	echo "<script> location='keranjang.php'; </script>";

?>