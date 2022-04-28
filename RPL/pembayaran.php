<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");

	//jika tidak ada session pelanggan maka tidak bisa diakses
	if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script> alert('Silahkan Login Terlebih Dahulu'); </script>";
	echo "<script> location='login.php' </script>";
	exit();
	}

	//mendapatkan id dari url
	$id_pem = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pem'");
	$detpem = $ambil->fetch_assoc();

	//mendapatkan id pelanggan yang beli
	$id_pelanggan_beli = $detpem['id_pelanggan'];
	//mendapatkan id pelanggan yang login
	$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

	if ($id_pelanggan_login !== $id_pelanggan_beli) {
		echo "<script> alert('Tidak Dapat Mengakses'); </script>";
		echo "<script> location='riwayat.php' </script>";
		exit();

	}

		// echo "<pre>";
		// print_r($detpem);
		// print_r($_SESSION);
		// echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>


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
	<nav class="navbar navbar-default" >
		<div class="container" style="background: black;">
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
			</ul>
		</div>

		<div class="container">
			<h2>Konfirmasi Pembayaran</h2>
			<p>Kirim Bukti Pembayaran Anda Disini</p>
			<div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem['total_pembelian']); ?></strong></div>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" name="nama" class="form-control" required="" placeholder="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" name="bank" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Jumlah (Rp.)</label>
					<input type="number" name="jumlah" class="form-control" min="1" required="" placeholder="<?php echo $detpem['total_pembelian']; ?>">
				</div>
				<div class="form-group">
					<label>Foto Bukti</label>
					<input type="file" name="bukti" class="form-control" required="">
					<p class="text-danger">Format Foto Bukti JPG Maksimal 2MB</p>
				</div>
				<button class="btn btn-primary" name="kirim">Kirim</button>
			</form>
		</div>

		<?php 
		if (isset($_POST['kirim'])) {
			
			//upload foto bukti
			$namabukti = $_FILES['bukti']['name'];
			$lokasibukti = $_FILES['bukti']['tmp_name'];
			//agar tidak sama fotonya
			$namafiks = date('YmdHis').$namabukti;
			//lokasi foto
			move_uploaded_file($lokasibukti, "bukti_pembayaran/".$namafiks);

			$tanggal = date('Y-m-d');

			$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
				VALUES ('$id_pem','$_POST[nama]','$_POST[bank]','$_POST[jumlah]','$tanggal','$namafiks') ");

			//update data pembelian dari pending menjadi sudah kirim pembayaran
			$koneksi->query("UPDATE pembelian SET status_pembelian = 'Proses' WHERE id_pembelian='$id_pem'");
			echo "<script> alert('Terima Kasih Sudah Memberikan Bukti Pembayaran'); </script>";
			echo "<script> location='riwayat.php' </script>";
			exit();
		}
		?>

</body>
</html>

