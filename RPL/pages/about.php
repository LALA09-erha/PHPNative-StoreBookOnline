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
        <title>BOS | Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../css/images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="../css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="../css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="../css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="../css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="../css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="../css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="../css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="../css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="../css/stylee.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="../css/responsive.css">
        <!-- Modernizr js -->
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
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
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.php">
                                        <img src="../css/images/logo.png"   alt="">
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
                                                <p class="minicart-total text-center">OPTIONS</p>
                                                <div class="minicart-button">
                                                    <a href="keranjang.php" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Profile</span>
                                                    </a>
                                                    <a a href="logout.php" onclick="return confirm('Apakah Anda Yakin ?')" class="li-button li-button-fullwidth">
                                                        <span>Logout</span>
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
                                            <li class="active"><a href="../index.php">Home</a></li>                                            
                                            <li><a href="../riwayat.php">Riwayat</a></li>
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="contact.php"> Contact</a></li>
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
                            <li><a href="../index.php">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- about wrapper start -->
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><span>Provide Best</span>Product For You</h2>
                                <p>We provide the best Beard oile all over the world. We are the worldd best store in indi for Beard Oil. You can buy our product without any hegitation because they truste us and buy our product without any hagitation because they belive and always happy buy our product.</p>
                                <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they belive us and always happy to buy our product.</p>
                                <p>We provide the beshat they trusted us and buy our product without any hagitation because they belive us and always happy to buy.</p>
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="../img/product/large-size/13.jpg" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
            <!-- about wrapper end -->
            <!-- Begin Counterup Area -->
            <div class="counterup-area">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin Limupa Counter Area -->
                            <div class="limupa-counter white-smoke-bg">
                                <div class="container">
                                    <div class="counter-img">
                                        <img src="../img/about-us/icon/1.png" alt="">
                                    </div>
                                    <div class="counter-info">
                                        <div class="counter-number">
                                            <h3 class="counter">2169</h3>
                                        </div>
                                        <div class="counter-text">
                                            <span>HAPPY CUSTOMERS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter gray-bg">
                                <div class="counter-img">
                                    <img src="../img/about-us/icon/2.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">869</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>AWARDS WINNED</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter white-smoke-bg">
                                <div class="counter-img">
                                    <img src="../img/about-us/icon/3.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">689</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>HOURS WORKED</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!-- Begin limupa Counter Area -->
                            <div class="limupa-counter gray-bg">
                                <div class="counter-img">
                                    <img src="../img/about-us/icon/4.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">2169</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>COMPLETE PROJECTS</span>
                                    </div>
                                </div>
                            </div>
                            <!-- limupa Counter Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counterup Area End Here -->
            <!-- team area wrapper start -->
            <div class="team-area pt-60 pt-sm-44">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="li-section-title capitalize mb-25">
                                <h2><span>our team</span></h2>
                            </div>
                        </div>
                    </div> <!-- section title end -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                                <div class="team-thumb">
                                    <img src="../img/team/1.png" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Jonathan Scott</h3>
                                    <p>IT Expert</p>
                                    <a href="#">info@example.com</a>
                                    <div class="team-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                                <div class="team-thumb">
                                    <img src="../img/team/2.png" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Oliver Bastin</h3>
                                    <p>Web Designer</p>
                                    <a href="#">info@example.com</a>
                                    <div class="team-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-30 mb-sm-60">
                                <div class="team-thumb">
                                    <img src="../img/team/3.png" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Erik Jonson</h3>
                                    <p>Web Developer</p>
                                    <a href="#">info@example.com</a>
                                    <div class="team-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end single team member -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="team-member mb-30 mb-sm-60 mb-xs-60">
                                <div class="team-thumb">
                                    <img src="../img/team/4.png" alt="Our Team Member">
                                </div>
                                <div class="team-content text-center">
                                    <h3>Maria Mandy</h3>
                                    <p>Marketing officer</p>
                                    <a href="#">info@example.com</a>
                                    <div class="team-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end single team member -->
                    </div>
                </div>
            </div>
            <!-- team area wrapper end -->
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
                                            <img src="../img/shipping-icon/1.png" alt="Shipping Icon">
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
                                            <img src="../img/shipping-icon/2.png" alt="Shipping Icon">
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
                                            <img src="../img/shipping-icon/3.png" alt="Shipping Icon">
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
                                            <img src="../img/shipping-icon/4.png" alt="Shipping Icon">
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
                                    <img src="../css/images/logo.png"   alt="">
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
                                        <img src="../img/payment/1.png" alt="">
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
          <script src="../js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="../js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="../js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="../js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="../js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="../js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="../js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="../js/isotope.pkgd.min.js"></script>
        <!-- imgloaded js -->
        <script src="../js/imgloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="../js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="../js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="../js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="../js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="../js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="../js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="../js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="../js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="../js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="../js/main.js"></script>
    </body>

<!-- shop-4-column31:48-->
</html>
