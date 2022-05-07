<?php 
session_start();
 	$koneksi = new mysqli("localhost","root","","tokobuku");
	 if (isset($_POST['daftar'])) {
		
		//mengambil input 
		$nama = $_POST['nama'];
		$password = $_POST['password'];
		$email = $_POST['gmail'];
		$telepon = $_POST['telepon'];

		//check apakah gmail sudah dipakai apa belum
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE gmail_pelanggan='$email'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==1) {
			echo "<script> alert('Pendaftaran Gagal Karena Gmail Sudah Digunakan');</script>";
			echo "<script> location='daftar.php' </script>";
		}
		else {
			$koneksi->query("INSERT INTO pelanggan (gmail_pelanggan, password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES ('$email','$password','$nama','$telepon')");
			echo "<script> alert('Pendaftaran Sukses, Silahkan Login');</script>";
			echo "<script> location='login.php' </script>";
		}

		echo "<script> alert('Data Tersimpan, Silakan Login') </script>";
		echo "<meta http-equiv='refresh' content='1;url=login.php?hal=produk'>";
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>BOS | Daftar</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="css/images/boslogo.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Register</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Complate Name</label>
									<input id="name" type="text" class="form-control" name="nama" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="gmail" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>
								<div class="form-group">
									<label for="phone">No Phone</label>
									<input id="phone" type="text" class="form-control" name="telepon" required >
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required>
										<label for="agree" class="custom-control-label">I agree to the Rules</label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="daftar" class="btn btn-warning btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2022 &mdash; BOS
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>