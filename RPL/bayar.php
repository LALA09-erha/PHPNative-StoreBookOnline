<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");
    if(!isset($_SESSION['pelanggan'])){
        header("location:login.php");
    }
	if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
		echo "<script> alert('Keranjang Belanja Kosong, Silahkan Berbelanja'); </script>";
		echo "<script> location='index.php'; </script>";
	}
	
?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shop-4-column31:48-->

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>BOS | Checkout</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="css/stylee.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span>Setting</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    	<!-- Jika Sudah Login-->
                                                        <?php if (isset($_SESSION['pelanggan'])): ?>
                                                        <li><a href="logout.php" onclick="return confirm('Apakah Anda Yakin ?')">Logout</a></li>
                                                        <li><a href="riwayat.php">Riwayat</a></li>
                                                        <!-- Jika Sudah Belum Login-->
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
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        <li>
                                            <span class="currency-selector-wrapper">Currency :</span>
                                            <div class="ht-currency-trigger"><span>USD $</span></div>
                                            <div class="currency ht-currency">
                                                <ul class="ht-setting-list">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li class="active"><a href="#">USD $</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        <li>
                                            <span class="language-selector-wrapper">Language :</span>
                                            <div class="ht-language-trigger"><span>English</span></div>
                                            <div class="language ht-language">
                                                <ul class="ht-setting-list">
                                                    <li class="active"><a href="#"><img src="img/menu/flag-icon/1.jpg" alt="">English</a></li>
                                                    <li><a href="#"><img src="img/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.php">
                                    <img src="css/images/logo.png"   alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="pencarian.php" method="get" class="hm-searchbox">
                                <input type="text" name="keyword" class="form-control" placeholder="Pencarian">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist" style="margin-right: 5px;">
                                            <a href="wishlist.html">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart justify-content-center align-items-center">
                                            <div class="hm-minicart-trigger" style="padding-right: 0;padding-left: 45px;">
                                                <span class="item-icon "></span>
                                            </div>
                                            
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    <li>
                                                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="minicart-product-image">
                                                            <img src="img/product/small-size/5.jpg" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Aenean eu tristique</a></h6>
                                                            <span>£40 x 1</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="minicart-product-image">
                                                            <img src="img/product/small-size/6.jpg" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Aenean eu tristique</a></h6>
                                                            <span>£40 x 1</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                                <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                                <div class="minicart-button">
                                                    <a href="keranjang.php" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="bayar.php" class="li-button li-button-fullwidth">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="hm-minicart justify-content-center align-items-center">
                                            <div class="hm-minicart-trigger" style="padding-right: 0;padding-left: 45px; background-color:#0363cd;">
                                                    <span class="item-iconn"></span>
                                            </div>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">
                                                    <li>
                                                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="minicart-product-image">
                                                            <img src="img/product/small-size/5.jpg" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Aenean eu tristique</a></h6>
                                                            <span>£40 x 1</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="minicart-product-image">
                                                            <img src="img/product/small-size/6.jpg" alt="cart products">
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Aenean eu tristique</a></h6>
                                                            <span>£40 x 1</span>
                                                        </div>
                                                        <button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                                <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                                <div class="minicart-button">
                                                    <a href="keranjang.php" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="bayar.php" class="li-button li-button-fullwidth">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="index.php">Home</a></li>                                            
                                            <li><a href="riwayat.php">Riwayat</a></li>
                                            <li><a href="pages/about.php">About Us</a></li>
                                            <li><a href="pages/contact.php"> Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- copy disini -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <form method="POST">
                                <div class="checkbox-form">
                                    <h3>Checkout Products</h3>
                                    <div class="row">
										<div class="col-md-12">
											<div class="checkout-form-list">
                                                <label>Nama <span class="required">*</span></label>
                                                <input  readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>" type="text">
                                            </div>
                                        </div>                                        
										<div class="col-md-12">
											<div class="checkout-form-list">
												<label>Email <span class="required">*</span></label>
												<input  readonly value="<?php echo $_SESSION['pelanggan']['gmail_pelanggan']; ?>" type="email">
											</div>
										</div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Alamat <span class="required">*</span></label>
                                                <input placeholder="Masukkan Alamat" rows="5" type="text" name="alamat_pengiriman" required="">
                                            </div>
                                        </div>                                       
                                      
										<div class="col-md-12">
											<div class="checkout-form-list">
												<label>Phone  <span class="required">*</span></label>
												<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>">
											</div>
                                        </div>
										<div class="col-md-12">
											<div class="country-select clearfix">
												<label>Jasa Pengiriman <span class="required">*</span></label>
												<select class="nice-select wide" name="id_kurir" id="idkurir" required="" onchange="fungsikurir()">
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
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Price</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $totalbelanja=0; ?>
										<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
										<!-- Menampilkan Produk Perulangan Berdasarkan id_produk-->
										<?php $ambildata = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'"); ?>
										<?php $pecah = $ambildata->fetch_assoc(); ?>
										<?php $subharga = $pecah['harga_produk']*$jumlah; ?>
                                            <tr class="cart_item">
                                              <td class="cart-product-name"><?php echo $pecah['nama_produk']; ?><strong class="product-quantity"> × <?php echo $jumlah ?></strong></td>
                                              <td class="cart-product-total"><span class="amount">Rp. <?php echo number_format($pecah['harga_produk']); ?></span></td>  
                                              <td class="cart-product-total"><span class="amount">Rp. <?php echo number_format($subharga); ?></span></td>  
                                            </tr>        
											<?php $totalbelanja+=$subharga; ?>
											<?php endforeach ?>           
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tarif</th>
                                                <td></td>
                                                <td><span class="amount" id="tarifongkir">Rp. 0</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td></td>
                                                <td><strong><span class="amount" id='totalharga'>Rp. <?php echo number_format($totalbelanja); ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        
                                        <div class="order-button-payment">
                                            <input value="Bayar" name="bayar" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Checkout Area End-->
            <!-- Begin Footer Area -->
            <div class="footer">
                <!-- Begin Footer Static Top Area -->
                <div class="footer-static-top">
                    <div class="container">
                        <!-- Begin Footer Shipping Area -->
                        <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                            <div class="row">
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="img/shipping-icon/1.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Free Delivery</h2>
                                            <p>And free returns. See checkout for delivery dates.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="img/shipping-icon/2.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Safe Payment</h2>
                                            <p>Pay with the world's most popular and secure payment methods.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="img/shipping-icon/3.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>Shop with Confidence</h2>
                                            <p>Our Buyer Protection covers your purchasefrom click to delivery.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                                <!-- Begin Li's Shipping Inner Box Area -->
                                <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                    <div class="li-shipping-inner-box">
                                        <div class="shipping-icon">
                                            <img src="img/shipping-icon/4.png" alt="Shipping Icon">
                                        </div>
                                        <div class="shipping-text">
                                            <h2>24/7 Help Center</h2>
                                            <p>Have a question? Call a Specialist or chat online.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Shipping Inner Box Area End Here -->
                            </div>
                        </div>
                        <!-- Footer Shipping Area End Here -->
                    </div>
                </div>
                <!-- Footer Static Top Area End Here -->
                <!-- Begin Footer Static Middle Area -->
                <div class="footer-static-middle">
                    <div class="container">
                        <div class="footer-logo-wrap pt-50 pb-35">
                            <div class="row">
                                <!-- Begin Footer Logo Area -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="footer-logo">
                                    <img src="css/images/logo.png"   alt="">
                                        <p class="info">
                                            We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.
                                        </p>
                                    </div>
                                    <ul class="des">
                                        <li>
                                            <span>Address: </span>
                                            6688Princess Road, London, Greater London BAS 23JK, UK
                                        </li>
                                        <li>
                                            <span>Phone: </span>
                                            <a href="#">(+123) 123 321 345</a>
                                        </li>
                                        <li>
                                            <span>Email: </span>
                                            <a href="mailto://info@yourdomain.com">info@yourdomain.com</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Logo Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Product</h3>
                                        <ul>
                                            <li><a href="#">Prices drop</a></li>
                                            <li><a href="#">New products</a></li>
                                            <li><a href="#">Best sales</a></li>
                                            <li><a href="#">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Our company</h3>
                                        <ul>
                                            <li><a href="#">Delivery</a></li>
                                            <li><a href="#">Legal Notice</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Footer Block Area End Here -->
                                <!-- Begin Footer Block Area -->
                                <div class="col-lg-4">
                                    <div class="footer-block">
                                        <h3 class="footer-block-title">Follow Us</h3>
                                        <ul class="social-link">
                                            <li class="twitter">
                                                <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="rss">
                                                <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                    <i class="fa fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="google-plus">
                                                <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="youtube">
                                                <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Begin Footer Newsletter Area -->
                                    <div class="footer-newsletter">
                                        <h4>Sign up to newsletter</h4>
                                        <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank" novalidate>
                                           <div id="mc_embed_signup_scroll">
                                              <div id="mc-form" class="mc-form subscribe-form form-group" >
                                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email" />
                                                <button  class="btn" id="mc-submit">Subscribe</button>
                                              </div>
                                           </div>
                                        </form>
                                    </div>
                                    <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Middle Area End Here -->
                <!-- Begin Footer Static Bottom Area -->
                <div class="footer-static-bottom pt-55 pb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Footer Links Area -->
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="#">Online Shopping</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Most Populars</a></li>
                                        <li><a href="#">New Arrivals</a></li>
                                        <li><a href="#">Special Products</a></li>
                                        <li><a href="#">Manufacturers</a></li>
                                        <li><a href="#">Our Stores</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Payments</a></li>
                                        <li><a href="#">Warantee</a></li>
                                        <li><a href="#">Refunds</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Discount</a></li>
                                        <li><a href="#">Refunds</a></li>
                                        <li><a href="#">Policy Shipping</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Links Area End Here -->
                                <!-- Begin Footer Payment Area -->
                                <div class="copyright text-center">
                                    <a href="#">
                                        <img src="img/payment/1.png" alt="">
                                    </a>
                                </div>
                                <!-- Footer Payment Area End Here -->
                                <!-- Begin Copyright Area -->
                                <div class="copyright text-center pt-25">
                                    <span><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
                                </div>
                                <!-- Copyright Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->

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
       <!-- jQuery-V1.12.4 -->
	   <script>
		   function fungsikurir() {
			   	var totalharga = <?php echo $totalbelanja; ?>;
				console.log(totalharga);
				var kurir = document.getElementById("idkurir").value;
			if(kurir =='1'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(9000 + totalharga);
					// var totalhrg = 9000 + totalharga;
					document.getElementById("tarifongkir").innerHTML = "Rp. 9.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
				}else if(kurir =='2'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(10000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 10.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='3'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(24000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 24.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='4'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(20000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 20.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='5'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(20000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 20.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='6'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(20000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 20.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='7'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(20000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 20.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}	else if(kurir =='8'){
					var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(20000 + totalharga);
					document.getElementById("tarifongkir").innerHTML = "Rp. 20.000";
					document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
				}else{
				var totalhrg = new Intl.NumberFormat(['ban', 'id']).format(0 + totalharga);
				document.getElementById("tarifongkir").innerHTML = "Rp. 0";
				document.getElementById("totalharga").innerHTML = "Rp. "+totalhrg;
			}
		}
	   </script>
	   <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- imgloaded js -->
        <script src="js/imgloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="js/main.js"></script>
    </body>

<!-- shop-4-column31:48-->
</html>
