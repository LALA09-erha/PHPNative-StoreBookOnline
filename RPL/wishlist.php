<?php
include "database/koneksi.php";

session_start();
// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (!isset($_SESSION['pelanggan'])) {
    header("location:login.php");
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- shop-4-column31:48-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BOS | Daftar Keinginan</title>
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
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="index.php">
                                    <img src="css/images/logo.png" alt="">
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
                                        <?php
                                        #menghitung jumlah barang yang ada di wishlist
                                        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                                        $querywishlist = $koneksi->query("SELECT * FROM wishlist WHERE id_pelanggan = '$id_pelanggan'");
                                        $countwishlist = $querywishlist->num_rows;
                                        #menghitung jumlah barang yang ada di keranjang belanja                                        
                                        $querykeranjang = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan'");
                                        $countkeranjang = $querykeranjang->num_rows;
                                        ?>
                                        <a href="wishlist.php">
                                            <span
                                                class="cart-item-count wishlist-item-count"><?php echo $countwishlist; ?></span>
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </li>
                                    <!-- Header Middle Wishlist Area End Here -->
                                    <!-- Begin Header Mini Cart Area -->
                                    <!-- JUMLAH ITEM DI KERANJANG -->
                                    <li class="hm-minicart justify-content-center align-items-center">
                                        <div class="hm-minicart-trigger" style="padding-right: 0;padding-left: 45px;">
                                            <span class="item-icon "></span>
                                            <span
                                                class="cart-item-count wishlist-item-count"><?php echo $countkeranjang; ?></span>

                                        </div>

                                        <div class="minicart">

                                            <p class="minicart-total text-center">KERANJANG</p>
                                            <div class="minicart-button">
                                                <a href="keranjang.php"
                                                    class="li-button li-button-fullwidth li-button-dark">
                                                    <span>View Full Cart</span>
                                                </a>
                                                <a href="bayar.php" class="li-button li-button-fullwidth">
                                                    <span>Checkout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="hm-minicart justify-content-center align-items-center">
                                        <div class="hm-minicart-trigger"
                                            style="padding-right: 0;padding-left: 45px; background-color:#0363cd;">
                                            <span class="item-iconn"></span>
                                        </div>
                                        <div class="minicart">
                                            <p class="minicart-total text-center">OPTIONS</p>
                                            <div class="minicart-button">

                                                <a a href="logout.php" onclick="return confirm('Apakah Anda Yakin ?')"
                                                    class="li-button li-button-fullwidth">
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
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><a href="riwayat.php">Riwayat</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                        <li><a href="keranjang.php"> keranjang</a></li>

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
                        <li class="active">Wishlist</li>
                        <?php
                        if (isset($_SESSION['pesan'])) {
                            echo '<li><div class="alert alert-success" role="alert">' . $_SESSION['pesan'] . '</div></li>';
                            unset($_SESSION['pesan']);
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Wishlist Area Strat-->
        <div class="wishlist-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-stock-status">Stock Status</th>
                                            <th class="li-product-add-cart">add to cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Menampilkan Produk Perulangan Berdasarkan id_produk-->
                                        <?php
                                        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                                        #menampilkan data produk berdasarkan id_produk pada database keranjang
                                        $ambildata = $koneksi->query("SELECT *
                                        FROM wishlist
                                        INNER JOIN produk ON wishlist.id_produk=produk.id_produk
                                        WHERE wishlist.id_pelanggan =$id_pelanggan;");

                                        ?>
                                        <?php
                                        #menampilkan data kosong jika tidak ada produk yang dibeli
                                        if ($ambildata->num_rows == 0) {
                                            echo "<tr>
                                            <td colspan='7' align='center'>
                                            <h3>Wishlist Kosong</h3>
                                            </td>
                                            </tr>";
                                        }
                                        while ($pecah = $ambildata->fetch_assoc()) {;

                                        ?>
                                        <tr>
                                            <td class="li-product-remove"><a
                                                    href="hapuskeranjang.php?idwishlist=<?php echo $pecah['id_wishlist'] ?>"><i
                                                        class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail"><a href="#"><img width="30%"
                                                        src="foto_produk/<?php echo $pecah['foto_produk']; ?>"
                                                        alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a
                                                    href="detail.php?id=<?php echo $pecah['id_produk']; ?>"><?php echo $pecah['nama_produk']; ?></a>
                                            </td>
                                            <td class="li-product-price"><span class="amount">Rp.
                                                    <?php echo number_format($pecah['harga_produk']); ?></span></td>
                                            <?php
                                                #mengecek stok produk
                                                if ($pecah['stok_produk'] == 0) {
                                                    echo " <td class='li-product-stock-status'><span class='out-stock'>Out Stock</span></td>";
                                                } else {
                                                    echo " <td class='li-product-stock-status'><span class='in-stock'>In Stock</span></td>";
                                                }
                                                ?>
                                            <td class="li-product-add-cart"><a
                                                    href="beli.php?id=<?php echo $pecah['id_produk']; ?>">add to
                                                    cart</a></td>
                                        </tr>
                                    </tbody>
                                    <?php } //endforeach} 
                                ?>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Wishlist Area End-->
        <!-- Begin Footer Area -->
        <div class="footer">
            <!-- Begin Footer Static Top Area -->
            <div class="footer-static-top">
                <div class="container">
                    <!-- Begin Footer Shipping Area -->
                    <div class="footer-shipping pt-60 pb-25">
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
            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row justify-content-center text-center">
                            <!-- Begin Footer Logo Area -->
                            <div class="col">
                                <div class="footer-logo">
                                    <img src="css/images/logo.png" alt="">
                                    <p class="info">
                                        Bos merupakan sebuah wesbsite yang menyediakan berbagai macam buku.
                                    </p>
                                </div>
                                <ul class="des">
                                    <li>
                                        <span>Alamat: </span>
                                        Jl. Raya Telang, Perumahan Telang Inda, Telang, Kec. Kamal, Kabupaten Bangkalan,
                                        Jawa Timur 69162
                                    </li>
                                    <li>
                                        <span>Telepon: </span>
                                        <a>(031) 3011146</a>
                                    </li>
                                    <li>
                                        <span>Email: </span>
                                        <a href="mailto://adminbos@gmail.com">adminbos@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->

                            <!-- Footer Static Bottom Area End Here -->
                        </div>
                        <!-- Footer Area End Here -->

                    </div>
                </div>
            </div>
            <!-- Modal Area End Here -->
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