<?php
include "database/koneksi.php";

	session_start();

	//menghancurkan pelanggan
	session_destroy();
	session_start();
	$_SESSION['pesan'] = "Logout Berhasil";
	header("location:login.php");

?>