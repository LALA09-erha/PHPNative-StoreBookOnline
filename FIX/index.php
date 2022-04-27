<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");
?>

<!DOCTYPE html>
<html>
<head>

	<title>Buku Terbaru</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
	<nav class="navbar navbar-default" style="background: black;" >


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
				<li><a href="rekomendasi.php">Rekomendasi</a></li>
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


<section class="myCarousel" id="myCarousel">
        <div class="myCarousel">
            <div class="row">
                <div class="col-sm-12 text-center">
                   <img src="img/store.png" width="128px" height="128px"><br>
                    <h1><b><font color="#f8192e">Multibook</font>Store</b></h1>
                    <hr>
                </div>
            </div>





	<!-- konten -->
	<section class="konten">
		<div class="container">
			<h2 class="title-post">Buku Terbaru</h2>
                <div class="meta-post">

                  <span><em class="glyphicon glyphicon-th-list"></em> Belanja Buku</span>&nbsp;&nbsp;
                  <span><em class="glyphicon glyphicon-calendar"></em> 7 Juni 2020</span>
			<div class="row">




				<?php $ambil = $koneksi->query("SELECT * FROM produk");?>
				<?php while($perproduk = $ambil->fetch_assoc()) { ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>">
						<div class="caption">
							<h3> <?php echo $perproduk['nama_produk']; ?></h3>
							<!-- Jika Stok ada tampilkan angka, jika tidak maka muncul habis -->
							<h5>Stok 
								<?php if($perproduk['stok_produk']>=1){
									echo $perproduk['stok_produk'];
								}
								else
									echo "<strong>Habis</strong>";

								 ?>
							</h5>
							<h5> Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
							<!-- Jika ada stok maka bisa beli, jika tidak maka tidak bisa membeli -->
							<?php if($perproduk['stok_produk']>=1) : { ?>
							<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-warning">Detail</a>
							<a href="keranjang.php" class="btn btn-success">Keranjang</a>


							<!-- <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-">Keranjang</a> -->

						<?php  } ?>
						<?php else  :{ ?>
							<button class="btn btn-danger">Habis</button>
						<?php } ?>
						<?php endif ?>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>




<!-- Bagian footer -->



    <div class="row" style="background: black;">
      <nav class="footer">
            <footer class="copyright text-center"><p>&copy; Copyright Multibook Store 2020</p></footer>
        </div>
      </nav>
    </div>
</body>
</html>