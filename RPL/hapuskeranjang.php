<?php
	include "database/koneksi.php";

	session_start();
	// $koneksi = new mysqli("localhost","root","","tokobuku");
	//ambil id
	#ambil id pelanggan yang login
	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
	if(isset($_GET['id_produk'])){
		$id_produk = $_GET['id_produk'];
		#hapus produk dari keranjang 
		$koneksi->query("DELETE FROM keranjang WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id_produk'");
		#pesan
		$_SESSION['pesan'] = "Produk Terhapus dari keranjang";
		//larikan ke keranjang
		header("location:keranjang.php");
		exit();
	}else if(isset($_GET['id'])){
		$id = $_GET['id'];
		if($id ==$id_pelanggan){
			$koneksi->query("DELETE FROM keranjang WHERE id_pelanggan='$id'");
			$_SESSION['pesan'] = "Semua Produk Berhasil Dihapus";
			header("location:keranjang.php");
			exit();
		}else{
			$_SESSION['pesan'] = "Produk Gagal Dihapus";
			header("location:keranjang.php");
			exit();
		}
	}else if(isset($_GET['idwishlist'])){
		$idwishlist = $_GET['idwishlist'];
		$koneksi->query("DELETE FROM wishlist WHERE id_wishlist='$idwishlist'");
		$_SESSION['pesan'] = "Produk Berhasil Dihapus dari Wishlist";
		header("location:wishlist.php");
		exit();
		
	}
	// echo "<script> alert('Produk Berhasil Dihapus'); </script>";
	// echo "<script> location='keranjang.php'; </script>";

?>