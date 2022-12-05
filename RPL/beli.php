<?php 
include "database/koneksi.php";

session_start();
// $koneksi = new mysqli("localhost","root","","tokobuku");

//mengambil id pada url
$id_produk = $_GET['id'];
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
//memasukkan produk yang dipilih ke dalam database keranjang
$ambil = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id_produk'");
$check = $ambil->num_rows;
#jika produk sudah ada di keranjang maka jumlah produk akan bertambah
if ($check>0) {
	#mengambil jumlah produk yang ada di keranjang dan menambahkan dengan jumlah produk yang dipilih
	$keranjang = $ambil->fetch_assoc();
	$jumlah_produk = $keranjang['jumlah']+1;
	$koneksi->query("UPDATE keranjang SET jumlah='$jumlah_produk' WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id_produk'");
	#pesan
	$_SESSION['pesan'] = "Produk Berhasil DiUpdate";
	#larikan ke keranjang
	header("location:keranjang.php");
}else{
	#menambahkan produk yang dipilih ke dalam keranjang belanja
	$koneksi->query("INSERT INTO keranjang (id_pelanggan,id_produk,jumlah) VALUES ('$id_pelanggan','$id_produk','1')");
	#pesan
	$_SESSION['pesan'] = "Produk Berhasil Ditambahkan";
	#larikan ke keranjang
	header("location:keranjang.php");
}
?>

<!-- <script> location='keranjang.php'; </script> -->