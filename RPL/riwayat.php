<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","tokobuku");
    if(!isset($_SESSION['pelanggan'])){
        header("location:login.php");
    }
?>
<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- shop-4-column31:48-->

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
                                        <img src="css/images/boslogo2.png" width="30%"   alt="">
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
                                        <li class="hm-wishlist">
                                            <a href="wishlist.html">
                                                <span class="cart-item-count wishlist-item-count">0</span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">£80.00
                                                    <span class="cart-item-count">2</span>
                                                </span>
                                            </div>
                                            <span></span>
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
                                                    <a href="shopping-cart.html" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="checkout.html" class="li-button li-button-fullwidth">
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
                                            <li class="dropdown-holder"><a href="index.html">Home</a>
                                                <ul class="hb-dropdown">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                </ul>
                                            </li>
                                            <li class="catmenu-dropdown megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                                        <ul>
                                                            <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                                            <li class="active"><a href="shop-4-column.html">Shop 4 Column</a></li>
                                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                            <li><a href="shop-list.html">Shop List</a></li>
                                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-product-gallery-left.html">Single Product Style</a>
                                                        <ul>
                                                            <li><a href="single-product-carousel.html">Single Product Carousel</a></li>
                                                            <li><a href="single-product-gallery-left.html">Single Product Gallery Left</a></li>
                                                            <li><a href="single-product-gallery-right.html">Single Product Gallery Right</a></li>
                                                            <li><a href="single-product-tab-style-top.html">Single Product Tab Style Top</a></li>
                                                            <li><a href="single-product-tab-style-left.html">Single Product Tab Style Left</a></li>
                                                            <li><a href="single-product-tab-style-right.html">Single Product Tab Style Right</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Single Products</a>
                                                        <ul>
                                                            <li><a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">Single Product</a></li>
                                                            <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                                            <li><a href="single-product-group.html">Single Product Group</a></li>
                                                            <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                                            <li><a href="single-product-affiliate.html">Single Product Affiliate</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a href="blog-left-sidebar.html">Blog</a>
                                                <ul class="hb-dropdown">
                                                    <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Blog Grid View</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">Blog List View</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-list.html">Blog List</a></li>
                                                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-details-left-sidebar.html">Blog Details</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-gallery-format.html">Blog Format</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                            <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                            <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="catmenu-dropdown megamenu-static-holder"><a href="index.html">Pages</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="blog-left-sidebar.html">Blog Layouts</a>
                                                        <ul>
                                                            <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li>
                                                            <li><a href="blog-list.html">Blog List</a></li>
                                                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="blog-details-left-sidebar.html">Blog Details Pages</a>
                                                        <ul>
                                                            <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                            <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                            <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                            <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index.html">Other Pages</a>
                                                        <ul>
                                                            <li><a href="login-register.html">My Account</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index.html">Other Pages 2</a>
                                                        <ul>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a href="about-us.html">About Us</a></li>
                                                            <li><a href="faq.html">FAQ</a></li>
                                                            <li><a href="404.html">404 Error</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="shop-left-sidebar.html">Smartwatch</a></li>
                                            <li><a href="shop-left-sidebar.html">Accessories</a></li>
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
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Shopping History</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-number">No</th>                                
                                                <th class="li-product-number">Purchase Date</th>                                
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total With Ongkir</th>                                                
                                                <th class="li-product-subtotal">Status</th>                                                
                                                <th class="li-product-subtotal">Action</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $nomor=1; ?>
                                        	<?php 
										//mendapatkan id yang login
										$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
										//ambil dan pecahkan
										$ambil = $koneksi->query("SELECT * FROM pembelian  JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian JOIN produk ON pembelian_produk.id_produk=produk.id_produk  join pelanggan on pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pelanggan = '$id_pelanggan'");
										while($pecah = $ambil->fetch_assoc()) {
										?>
                                            <tr>
                                                <td class="li-product-number"><span><?php echo $nomor; ?></span></td>
                                                <td class="li-product-number"><span><?php echo $pecah['tanggal_pembelian']; ?></span></td>
                                                <td class="li-product-name"><a href="detail.php?id=<?php echo $pecah['id_produk']; ?>"><?php echo $pecah['nama_produk']; ?></a></td>
                                                <td class="li-product-price"><span class="amount">Rp. <?php echo number_format($pecah['harga_produk']); ?></span></td>
                                                <td class="quantity">
                                                    <?php echo $pecah['jumlah_pembelian']; ?>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">Rp. <?php echo number_format($pecah['total_pembelian']);  ?></span></td>
												<td class="li-product-number"><span><?php echo  $pecah['status_pembelian']; ?></span></td>
                                                <td class="li-product-add-cart">
													<a href="nota.php?id=<?php echo $pecah['id_pembelian']?>" class="bg-info p-1">Nota</a>
													<?php if($pecah['status_pembelian']=='Tertunda'): ?>
														<a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="bg-success p-1">Pembayaran</a>
														<?php else: ?>
															<!-- <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-warning">Lihat</a> -->
													<?php endif ?>
													
												</td>
                                            </tr>
                                            <?php $nomor++; ?>
											<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="cart-page-total">
                                                <a href="index.php">Lanjut Belanja</a>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->
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
                                        <img src="img/menu/logo/1.jpg" alt="Footer Logo">
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
                                        <img src="images/payment/1.png" alt="">
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
        <!-- jQuery-V1.12.4 -->
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
        <!-- Imagesloaded js -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
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

<!-- shopping-cart31:32-->
</html>
