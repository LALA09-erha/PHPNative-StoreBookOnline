<?php 
session_start();
 $koneksi = new mysqli("localhost","root","","tokobuku");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of 
         HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="assets/style.css" rel="stylesheet">

    <style>

      #header .headerBackground{
  width: 1520px;
  height: 250px;
  background: url(img/background.jpg);
  background-size: cover; 
}

    #header{
      background: blue;
      width: 940px;
      height: 240px;
    }
    h1{
      padding-top: 0px;
    }
    article {
      background-color: white;
    }
  </style>

<body>
  <div id="container">
    <div id="header">
      <div class="headerBackground">
        <h1><font color="#f8192e"><br><br><b>&nbsp;&nbsp;Multibook</font><font color="#ffffff"> Store</font></b></h1>
      </div>
    </div>
  <body>


	<!-- navbar -->
	<nav class="navbar navbar-default"  style="background: black;">
		
		<div class="container" style="background: black;">
			<ul class="nav navbar-nav" >
				<!-- Jika Sudah Login-->
				<?php if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="riwayat.php">Riwayat</a></li>


				<!-- Jika Sudah Belum Login-->
				<?php else: ?>
				<li><a href="login.php">Login</a></li>
					
				<li><a href="daftar.php">Daftar</a></li>
				<?php endif ?>			
				<li><a href="index.php">Belanja</a></li>
				<li><a href="rekomendasi.php">Rekomendasi</a></li>
				<?php if(!isset($_SESSION["keranjang"])) : ?>
					<li><a href="keranjang.php">Keranjang<strong>(0)</strong></a></li>
				<?php else : ?>
				<hide>
						<?php $jml=0; ?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
						<!-- Menampilkan Produk Perulangan Berdasarkan id_produk-->
						<?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'"); ?>
						<?php $pecah = $ambildata->fetch_assoc(); ?>
						<tr>
							<td><?php $jumlah ?></td>
						</tr>
						<?php $jml += $jumlah; ?>
						<?php endforeach ?>
				</hide>
				<li><a href="keranjang.php">Keranjang<strong>(<?php echo $jml ?>)</strong></a></li>
			<?php endif ?>
				<li><a href="bayar.php">Pembayaran</a></li>
			</ul>

			<form action="pencarian.php" method="get" class="navbar-form navbar-right">
				<input type="text" name="keyword" class="form-control" placeholder="Pencarian">
				<button class="btn btn-primary">Cari</button>
			</form>
		</div>
	</nav>

	<div class="container" style="background: #BE5C5C;">
		<div class="row">
			<div class="col-md-4">
				<div class="pane panel-default">
					<div class="panel-heading" style="background: #BE5C5C;">
						<h3 class="panel-title">Formulir Pendaftaran</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="gmail" class="form-control">
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="text" name="telepon" class="form-control">
							</div>
							<button class="btn btn-primary" name="daftar">Daftar</button>
							<a href="login.php"<button class="btn btn-warning" name="daftar">Batal</button></a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	

</body>
</html>

<?php  
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
