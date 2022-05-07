<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");
	if (isset($_POST["login"])) {
		//$gmail = $_POST["gmail"];
		//$password = $_POST["password"];
		//check account pada db
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE gmail_pelanggan='$_POST[gmail]' AND password_pelanggan='$_POST[password]'");
		//menghitung account yang cocok pada db
		$akunyangcocok = $ambil->num_rows;
		if ($akunyangcocok==1) {
			$_SESSION['pelanggan'] = $ambil->fetch_assoc();
			//$akun = $ambil->fetch_assoc();
			//$_SESSION["pelanggan"] = $akun;
			echo "<script> alert('Login Berhasil'); </script>";
			echo "<script> location='index.php'; </script>";
			
		}
		else {
			echo "<script> alert('Login Gagal, Tekan Ok Untuk Coba Lagi'); </script>";
			echo "<script> location='login.php'; </script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>BOS | Masuk</title>
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
						<img src="css/images/boslogo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="gmail"  required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>


								<div class="form-group m-0">
									<button type="submit" name="login" class="btn btn-warning btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="daftar.php">Create One</a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
