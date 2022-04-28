<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");
?>

<!DOCTYPE html>
<html>
<head>

	<title>New Release</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 50%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 9px;
  width: 9px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
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


<!-- Awal dari Slide Show -->

 
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>

            </ol>




<!-- deklarasi carousel -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="img/bannertoko2.jpg" style="display: block; margin: auto;">
                    <div class="carousel-caption">
                        <h3>MultiBook Store</h3>
                        <p>Toko Buku Terupdate dan Terlengkap</p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/ss1.jpg" style="display: block; margin: auto;">
                    <div class="carousel-caption">
                        <h3>Toko Buku Terlengkap</h3>
                        <p>Lebih dari 100 Penerbit Internasional dan Lokal</p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/ss2.jpg" style="display: block; margin: auto;">
                    <div class="carousel-caption">
                        <h3>Buku Terbaru</h3>
                        <p>Pilih sendiri di Katalog Buku.</p>
                    </div>
                </div>              
            </div>

            <!-- membuat panah next dan previous -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
   </div>

   <!-- Akhir dari Slide Show -->




<section class="myCarousel" id="myCarousel">
        <div class="myCarousel">
            <div class="row">
                <div class="col-sm-12 text-center">
                   <img src="img/store.png" width="128px" height="128px"><br>
                    <h1><b><font color="#f8192e">MultiBook</font> Store</b></h1>
                    <p><h4><font color="#f8192e">Toko Buku Terupdate dan Terlengkap</font></p><h4>
                    <hr>
                </div>
            </div>




        <!-- Images -->
        <div class="row">
          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb1.jpg">
              <h5>Mary Higgins C : Daddy Little Girl</h5>

            </a>
          </div>

        <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb2.jpg">
               <h5>Auguste Dupin : Detektif Prancis</h5>
            </a>
          </div>

          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb3.jpg">
               <h5>Harry Potter and the Half Blood Prince1</h5>
            </a>
          </div>

          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb4.jpg">
               <h5>The Hobbit : There and Back Again</h5>
            </a>
          </div>

          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb5.jpg">
               <h5>Andrea Hirata : Laskar Pelangi</h5>
            </a>
          </div>

          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb6.jpg">
               <h5>Agatha Christie : The Pale House</h5>
            </a>
          </div>

          <div class="col-sm-3 text-center">
            <a href="index.php" class="thumbnail">
              <img src="img/tb8.jpg">
               <h5>And Then There Were None</h5>
            </a>
          </div>  


          

        </div>
      </div>
    </section>
    <!-- End of New Book -->







<!-- Bagian footer -->



    <div class="row" style="background: black;">
      <nav class="footer">
            <footer class="copyright text-center"><p>&copy; Copyright Multibook Store 2020</p></footer>
        </div>
      </nav>
    </div>
</body>
</html>