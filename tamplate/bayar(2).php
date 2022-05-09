<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");

//jika belum masuk/login
	if (!isset($_SESSION['pelanggan'])) {
		echo "<script> alert('Login Terlebih Dahulu, Klik Ok Untuk Melanjutkan Login'); </script>";
		echo "<script> location='login.php' </script>";
	}

//keranjang kosong
	if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
		echo "<script> alert('Keranjang Belanja Kosong, Silahkan Berbelanja'); </script>";
		echo "<script> location='index.php'; </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pembayaran</title>
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
				<?php if(!isset($_SESSION["keranjang"])) : ?>
					<li><a href="rekomendasi.php">Rekomendasi</a></li>
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
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered ">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total Belanja</th>
					</tr>
				</thead>

				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja=0; ?>
					<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<!-- Menampilkan Produk Perulangan Berdasarkan id_produk-->
					<?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'"); ?>
					<?php $pecah = $ambildata->fetch_assoc(); ?>
					<?php $subharga = $pecah['harga_produk']*$jumlah; ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
					</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>

				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja); ?></th>
					</tr>
				</tfoot>
			</table>

			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Gmail</label>
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['gmail_pelanggan']; ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nomor Telepon</label>
							<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Jasa Pengiriman</label>
							<select class="form-control" name="id_kurir" required="">
								<option value="">Pilih Jasa Antar</option>
								<?php 
									$ambil = $koneksi->query("SELECT * FROM kurir");
									while($kurir = $ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $kurir['id_kurir']; ?>">
									<?php echo $kurir['nama_kurir'] ?> - 
									Rp. <?php echo number_format($kurir['tarif']) ?>	
								</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Total</label>
							<input type="text" readonly="" value="Rp. <?php echo number_format($totalbelanja+$kurir); ?>" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" rows="5" placeholder="Masukkan Alamat Lengkap Anda" name="alamat_pengiriman" required=""></textarea>
				</div>

				<button class="btn btn-primary" name="bayar">Bayar</button>
			</form>

			<?php 
				if (isset($_POST['bayar'])) {
					$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
					$id_kurir = $_POST['id_kurir'];
					$tanggal_pembelian = date('Y-m-d');
					$alamat_pengiriman = $_POST['alamat_pengiriman'];

					$ambil = $koneksi->query("SELECT * FROM kurir WHERE id_kurir='$id_kurir'");
					$arraykurir = $ambil->fetch_assoc();
					$nama_kurir = $arraykurir['nama_kurir'];
					$kurir = $arraykurir['tarif'];

					$total_pembelian = $totalbelanja+$kurir;

					//1. Menyimpan data ke tabel pembelian
					$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_kurir,tanggal_pembelian,total_pembelian, nama_kurir,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_kurir', '$tanggal_pembelian',
						'$total_pembelian','$nama_kurir','$kurir','$alamat_pengiriman')");

					//2. Menyimpan data pembelian ke tabel pembelian produk
					//mendapatkan id pembelian barusan terjadi
					$id_pembelian_barusan = $koneksi->insert_id;

					//menyimpan 
					foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
						$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah_pembelian) VALUES ('$id_pembelian_barusan','$id_produk', '$jumlah') ");

						//mengurangi stok yang dibeli
						$koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk = '$id_produk'");
					}

					//mengkosongkan keranjang belanjaan
					unset($_SESSION['keranjang']);

					//tampilan dialihkan kehalaman nota, nota pembelian barusan
					echo "<script> alert('Pembelian Sukses'); </script>";
					echo "<script> location='nota.php?id=$id_pembelian_barusan'; </script>";

				}

			?>

		</div>
	</section>

<script type="text/javascript" src="admin/assets/js/jquery-3.3.1.min.js"></script>

</body>
</html>
