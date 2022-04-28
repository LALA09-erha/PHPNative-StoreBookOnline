<?php 
	session_start();
?>
<?php
	$koneksi = new mysqli("localhost","root","","tokobuku");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
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
	<nav class="navbar navbar-default"style="background: black;" >
		<div class="container">
			<ul class="nav navbar-nav" style="background: black;">
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
				<li><a href="bayar.php">Bayar</a></li>
			</ul>

			<form action="pencarian.php" method="get" class="navbar-form navbar-right">
				<input type="text" name="keyword" class="form-control" placeholder="Pencarian">
				<button class="btn btn-primary">Cari</button>
			</form>
		</div>
	</nav>

	<section class="konten">
		<div class="container">
			<h2>Detail Pembelian</h2>
			<?php  
				$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
				$detail=$ambil->fetch_assoc();
			?>

			<?php 
			//mendapatkan id yang beli
			$idpelangganyangbeli = $detail['id_pelanggan'];

			//mendapatkan id pelanggan yang login
			$idpelangganyanglogin = $_SESSION['pelanggan']['id_pelanggan'];

			if ($idpelangganyangbeli!==$idpelangganyanglogin) {
				echo "<script> alert('Gagal');</script>";
				echo "<script> location='riwayat .php'; </script>";
			}
			?>


			<p>
				Kode Pembelian : <strong>H-<?php echo $detail['id_pembelian']; ?>-S</strong><br>
				Tanggal Pembelian : <?php echo $detail['tanggal_pembelian']; ?> <br>
				Harga Pembelian : Rp. <?php echo number_format($detail['total_pembelian'])?>
			</p>
			<div class="row">
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong><?php echo $detail['nama_pelanggan']?></strong>
					<p>Nomor Telepon :  <?php echo $detail['telepon_pelanggan']?><br>Gmail : <?php echo $detail['gmail_pelanggan']; ?>
					</p>	
				</div>
				<div class="col-md-4">
					<h3>Pengirim</h3>
					<strong><?php echo $detail['nama_kurir']; ?></strong>
					<p>Tarif : Rp. <?php echo number_format($detail['tarif']); ?></p>
				</div>
				<div class="col-md-4">
					<h3>Alamat Pengiriman</h3>
					<strong><?php echo $detail['alamat_pengiriman']; ?></strong>
				</div>
			</div>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
					</tr>
				</thead>

				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja=0;?>
					<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
					<?php while($pecah=$ambil->fetch_assoc()) { ?>
						<?php $subharga =  $pecah['harga_produk']*$pecah['jumlah_pembelian']; ?>
					<tr>
						<td> <?php echo $nomor; ?></td>
						<td> <?php echo $pecah['nama_produk']; ?></td>
						<td> Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td> <?php echo $pecah['jumlah_pembelian']; ?></td>
						<td> Rp. <?php echo number_format($subharga); ?></td>
					</tr>
					<?php $nomor++ ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php } ?>
				</tbody>


				<tfoot>
					<tr>
						<th colspan="4">Tarif</th>
						<td>Rp. <?php echo number_format($detail['tarif']); ?></td>
					</tr>
					<tr>
						<th colspan="4">TOTAL</th>
						<th>Rp. <?php echo number_format($totalbelanja+$detail['tarif']); ?></th>
					</tr>
				</tfoot>

			</table>

			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>
							Silahkan melakukan Pembayaran <strong>Rp. <?php echo number_format($detail['total_pembelian'])?></strong>
							Ke <br>
							<strong>BANK KITA 137-99123-42222-3242 AN. Irham Nurrahman</strong>
							
						</p>
					</div>
				</div>
			</div>

		</div>
	</section>

</body>
</html>