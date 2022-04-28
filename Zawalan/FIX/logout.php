<?php
	session_start();

	//menghancurkan pelanggan
	session_destroy();
	echo "<script> alert('Anda Berhasil Keluar'); </script>";
	echo "<script> location='index.php'; </script>";

?>