<?php 
session_start();
//mengambil id pada url
$id_produk = $_GET['id'];

//jika produk sudah dikeranjang +1
if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}
//selian itu produk itu dianggap dibeli 1
else {
	$_SESSION['keranjang'][$id_produk] = 1;
}

//setelah itu larikan ke halaman keranjang
echo "<script> alert('Produk Tersimpan Pada keranjang'); </script>";

?>

<script> location='keranjang.php'; </script>