<?php 
session_start();
$koneksi = new mysqli("localhost","root","","tokobuku");

//Keranjang Kosong
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script> alert('Keranjang Belanja Kosong, Silahkan Berbelanja'); </script>";
	echo "<script> location='index.php'; </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
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

	<!-- konten -->
	<section class="konten">
		<div class="container">
			<h1><span><em class="glyphicon glyphicon-shopping-cart"></em> Keranjang Buku</span>&nbsp;&nbsp;</h1>
			<hr>
			<table class="table table-bordered ">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Buku</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<!-- Menampilkan Produk Perulangan Berdasarkan id_produk-->
					<?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'"); ?>
					<?php $pecah = $ambildata->fetch_assoc(); ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']*$jumlah); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs" 
								onclick="return confirm('Apakah Anda Yakin ?');">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-success">Lanjut Belanja</a>
			<a href="bayar.php" class="btn btn-primary">Bayar</a>
			<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger" 
								onclick="return confirm('Apakah Anda Yakin ?');">Hapus Semua</a>
		</div>
	</section>

</body>
</html>