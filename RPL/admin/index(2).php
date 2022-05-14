<?php
    //account dimasukkan kedalam session
    session_start();
    
    $koneksi = new mysqli("localhost","root","","tokobuku");

    //harus login
    if (!isset($_SESSION['admin'])) {
        echo "<script> alert('Anda Belum Login, Silahkan Tekan Ok Untuk Login'); </script>";
        echo "<script> location='login.php'; </script>";
        exit();
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="background: #0000; color: white">Admin Panel</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="index.php?hal=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   



           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side " role="navigation">
            <div class="sidebar-collapse" style="background: #770101; color: white">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/store.png" class="user-image img-responsive"/>
					</li>
				    
					
                    <li><a href="index.php"><i class="fa fa-home "></i> Admin</a></li>
                    <li><a href="index.php?hal=produk"><i class="fa fa-book "></i> Buku</a></li>
                    <li><a href="index.php?hal=pembeli"><i class="fa fa-shopping-cart"></i> Pembeli</a></li>
                    <!-- <li><a href="index.php?hal=laporan_pembelian"><i class="fa fa-file"></i> Laporan</a></li> -->
                    <li><a href="index.php?hal=pelanggan"><i class="fa fa-user"></i> Pelanggan</a></li>
                   <!-- <li><a href="index.php?hal=logout"><i class="fa fa-sign-out"></i> Logout</a></li> -->

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php  
                    if (isset($_GET['hal'])) {
                        if ($_GET['hal']=="produk") {
                            include 'produk.php';
                        }
                        elseif ($_GET['hal']=="pembeli") {
                            include 'pembeli.php';
                        }
                        elseif ($_GET['hal']=="pelanggan") {
                            include 'pelanggan.php';
                        }
                        elseif ($_GET['hal']=="hapuspelanggan") {
                            include 'hapuspelanggan.php';
                        }
                        elseif ($_GET['hal']=="ubahpelanggan") {
                            include 'ubahpelanggan.php';
                        }
                        elseif ($_GET['hal']=="detail") {
                            include'detail.php';
                        }
                        elseif ($_GET['hal']=="tambahproduk") {
                            include'tambahproduk.php';
                        }
                        elseif ($_GET['hal']=="hapusproduk") {
                            include 'hapusproduk.php';
                        }
                        elseif($_GET['hal']=="ubahproduk") {
                            include 'ubahproduk.php';
                        }
                        elseif ($_GET['hal']=="logout") {
                            include 'logout.php';
                        }
                        elseif ($_GET['hal']=="pembayaran") {
                            include 'pembayaran.php';
                        }
                        elseif ($_GET['hal']=="laporan_pembelian") {
                            include 'laporan_pembelian.php';
                        }
                    }
                    else {
                        include'home.php';
                    }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
