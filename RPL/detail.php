<?php session_start(); ?>
<?php 
	$koneksi = new mysqli("localhost","root","","tokobuku");
?>
<?php 
//mendapatkan id dari url
	$id_produk = $_GET['id'];
//ambil data id dari database
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$detail = $ambil->fetch_assoc();

	// echo "<pre>";
	// print_r($detail);
	// echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
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
	<nav class="navbar navbar-default" style="background: black;">
		<div class="container">
			<ul class="nav navbar-nav">
				<!-- Jika Sudah Login-->
				<?php if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="logout.php" onclick="return confirm('Apakah Anda Yakin ?')">Logout</a></li>
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
				<li><a href="keranjang.php">Keranjang<strong><sup>(<?php echo $jml ?>)</sup></strong></a></li>
			<?php endif ?>
				<li><a href="bayar.php">Pembayaran</a></li>
			</ul>

			<form action="pencarian.php" method="get" class="navbar-form navbar-right">
				<input type="text" name="keyword" class="form-control" placeholder="Pencarian">
				<button class="btn btn-primary">Cari</button>
			</form>
		</div>
	</nav>

	<!-- section -->
	<section class="kontent">
		<div class="container" >
			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive" >
				</div>
				<div class="col-md-6">
					<label>Nama Buku : </label>
					<?php echo $detail['nama_produk']; ?>
				</div>
				<div class="col-md-6">
					<label>Harga : </label>
					Rp. <?php echo number_format($detail['harga_produk']); ?>
				</div>
				<div class="col-md-6">
					<label>Deskripsi : </label><br>
					<p><?php echo $detail['deskripsi_produk']; ?></p>
					<a href="resep_produk/<?php echo $detail['resep_produk']; ?>" class="navbar-right">Cover Lainnya</a>
				</div>
				<div class="col-md-6">
					<label>Stok Buku ( <strong><?php echo $detail['stok_produk']?></strong> )</label>
				</div>
				<div class="col-md-6">
					<form method="post">
						<div class="form-group">
							<div class="input-group">
								<input type="number" min="1" max='<?php echo $detail['stok_produk']?>'name="jumlah" class="form-control" placeholder="Masukkan Jumlah Barang" required="">
								<div class="input-group-btn">
									<button class="btn btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php
		//mengambil id yang dibeli
		$id_produk = $_GET['id'];
		//jika ada tombol beli
		if (isset($_POST['beli'])) {
			//mendapatkan jumlah yang dibeli
			$jumlah = $_POST['jumlah'];
			//masukkan keranjang
			$_SESSION["keranjang"][$id_produk] += $jumlah;


			echo "<script> alert('Produk Masuk Kedalam Keranjang');</script>";
			echo "<script> location='keranjang.php' </script>";
		}
	?>

</body>
</html>