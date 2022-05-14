<?php

if (isset($_POST['login'])) {
	$koneksi = new mysqli("localhost","root","","tokobuku");
	 session_start();
	$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password = '$_POST[pass]'");
	$yangcocok = $ambil->num_rows;
	if ($yangcocok==1) {
	  $_SESSION['admin'] = $ambil->fetch_assoc();
	  echo "<div class='alert alert-info'>Login Berhasil</div>";
	  echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	}
	else {
	  echo "<div class='alert alert-danger'>Login Gagal</div>";
	  echo "<meta http-equiv='refresh' content='1;url=login.php'>";
	}
	exit();
  }
	session_destroy();
	echo "<script> alert('Anda Telah Logout'); </script>";
	echo "<script> location='login.php'; </script>";

?>
