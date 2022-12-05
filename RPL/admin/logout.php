<?php
include "../database/koneksi.php";

if (isset($_POST['login'])) {
	// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
	session_start();
	$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password = '$_POST[pass]'");
	$yangcocok = $ambil->num_rows;
	if ($yangcocok == 1) {
		$_SESSION['admin'] = $ambil->fetch_assoc();
		$_SESSION['pesan'] = "Anda berhasil login";
		echo "<script> location='index.php'; </script>";
	} else {
		$_SESSION['pesan'] = "Login gagal";
		echo "<script> location='login.php'; </script>";
	}
	exit();
}
session_start();
unset($_SESSION['admin']);
session_destroy();
session_start();
$_SESSION['pesan'] = "Anda berhasil logout";
echo "<script> location='login.php'; </script>";