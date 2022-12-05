<?php
include "database/koneksi.php";

session_start();
// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (!isset($_SESSION['pelanggan'])) {
    header("location:login.php");
}

//mendapatkan id dari url
$id_produk = $_GET['id'];
//ambil data id dari database
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
if (isset($_POST['beli'])) {
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
    //memasukkan produk yang dipilih ke dalam database keranjang
    $ambill = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id_produk'");
    $check = $ambill->num_rows;
    //mendapatkan jumlah yang dibeli
    $jumlah = $_POST['jumlah'];
    if ($check > 0) {
        #mengambil jumlah produk yang ada di keranjang dan menambahkan dengan jumlah produk yang dipilih
        $keranjang = $ambill->fetch_assoc();
        $jumlah_produk = $keranjang['jumlah'] + $jumlah;
        $koneksi->query("UPDATE keranjang SET jumlah='$jumlah_produk' WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id_produk'");
        #pesan
        $_SESSION['pesan'] = "Produk Berhasil DiUpdate";
        #larikan ke keranjang
        header("location:keranjang.php");
    } else {
        #menambahkan produk yang dipilih ke dalam keranjang belanja
        $koneksi->query("INSERT INTO keranjang (id_pelanggan,id_produk,jumlah) VALUES ('$id_pelanggan','$id_produk','$jumlah')");
        #pesan
        $_SESSION['pesan'] = "Produk Berhasil Ditambahkan";
        #larikan ke keranjang
        header("location:keranjang.php");
    }
}


?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- shop-4-column31:48-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BOS | Detail Produk</title>
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
                            <?php
                            #menghitung jumlah barang yang ada di wishlist
                            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                            $querywishlist = $koneksi->query("SELECT * FROM wishlist WHERE id_pelanggan = '$id_pelanggan'");
                            $countwishlist = $querywishlist->num_rows;
                            #menghitung jumlah barang yang ada di keranjang belanja                                        
                            $querykeranjang = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan'");
                            $countkeranjang = $querykeranjang->num_rows;
                            ?>
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <!-- Begin Header Middle Wishlist Area -->
                                    <li class="hm-wishlist" style="margin-right: 5px;">
                                        <a href="wishlist.php">
                                            <span
                                                class="cart-item-count wishlist-item-count"><?php echo $countwishlist ?></span>
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
                                                class="cart-item-count wishlist-item-count"><?php echo $countkeranjang ?></span>

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
                        <li class="active">Single Product</li>
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
        <!-- content-wraper start -->
        <div class="content-wraper">
            <div class="container">
                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item"
                                        href="foto_produk/<?php echo $detail['foto_produk']; ?>" data-gall="myGallery">
                                        <img src="foto_produk/<?php echo $detail['foto_produk']; ?>">
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2><?php echo $detail['nama_produk']; ?></h2>
                                <span class="product-details-ref"><?php echo $detail['kategori']; ?></span>
                                <?php
                                #code mengambil rating dari tabel rating dengan id produk
                                $sql = mysqli_query($koneksi, "SELECT * FROM rating WHERE id_produk='$id_produk'");
                                $jumlah = mysqli_num_rows($sql);

                                ?>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <?php
                                        if ($jumlah == 0) {
                                            echo '0.0 <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>';
                                        } else {
                                            $total = 0;
                                            while ($data = mysqli_fetch_array($sql)) {
                                                $total = $total + $data['nilai'];
                                            }
                                            $rata = $total / $jumlah;
                                            $floor = floor($rata);
                                            echo round($rata, 1) . " ";
                                            #menerapkan perulangan untuk menampilkan bintang sesuai dengan rating
                                            for ($i = 0; $i < 5; $i++) {
                                                #menampilkan bintang setengah jika rating decimal
                                                if ($rata - $floor != 0 && $i == $floor) {
                                                    echo '<li><i class="fa fa-star-half-o"></i></li>';
                                                } else if ($floor > $i) {
                                                    echo '<li><i class="fa fa-star"></i></li>';
                                                } else {
                                                    echo '<li><i class="fa fa-star-o"></i></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">Rp.
                                        <?php echo number_format($detail['harga_produk']); ?></span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span><?php echo $detail['deskripsi_produk']; ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <label>Stok Buku : <strong
                                                style="color:red"><?php echo $detail['stok_produk'] ?></strong> </label>

                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    <form method="POST" class="cart-quantity">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="number" min="1"
                                                    max='<?php echo $detail['stok_produk'] ?>' name="jumlah" value="1">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <?php if ($detail['stok_produk'] >= 1) : { ?>
                                        <button class="add-to-cart" type="submit" name="beli">Add to cart</button>
                                        <?php  } ?>
                                        <?php else : { ?>
                                        <button class="add-to-cart"><a>Habis</a></button>
                                        <?php } ?>
                                        <?php endif ?>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <?php if (isset($_GET['pembelian'])) :
                                    ?>

                                    <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write
                                        Your Review!</a>
                                    <?php endif
                                    ?>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                            </li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a>
                                            </li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                    +</a></li>
                                            <li class="instagram"><a href="#"><i
                                                        class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="review-btn">
                                </div>
                                <div class="block-reassurance">
                                    <ul>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-check-square-o"></i>
                                                </div>
                                                <p>Security policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-truck"></i>
                                                </div>
                                                <p>Delivery policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-exchange"></i>
                                                </div>
                                                <p> Return policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wraper end -->
        <!-- Begin Product Area -->
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="reviews" class="tab-pane active show" role="tabpanel">
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                                <table class="table table-hover">
                                    <?php
                                    #membuat pagination
                                    $batas = 5;
                                    $datakomen = $koneksi->query("SELECT * FROM komen join pelanggan on komen.id_pelanggan=pelanggan.id_pelanggan WHERE id_produk='$id_produk'");
                                    $jumlah_data = mysqli_num_rows($datakomen);
                                    $jumlah_halaman = ceil($jumlah_data / $batas);
                                    $halaman_aktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $awal = ($halaman_aktif * $batas) - $batas;
                                    $datakomenn = $koneksi->query("SELECT nama_pelanggan,komen,nilai FROM komen join pelanggan on komen.id_pelanggan=pelanggan.id_pelanggan WHERE id_produk='$id_produk' ORDER BY id_komen DESC LIMIT $awal, $batas");
                                    #tampilkan pesan jika tidak ada komentar yang tampil
                                    if ($jumlah_data == 0) {
                                        echo "<tr><td colspan='2'><h4>Belum ada komentar</h4></td></tr>";
                                    }
                                    while ($komen = $datakomenn->fetch_assoc()) {

                                        #mengambil data komen dari database berdasarkan id produk yang dipilih                                                          
                                    ?>
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo $komen['nama_pelanggan'] ?>&ensp;
                                                <?php echo $komen['nilai'] ?>
                                                <i class="fa fa-star" style="color:orange;"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <p><?php echo $komen['komen'] ?></p>
                                            </th>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <?php
                                #membuat pagination number
                                for ($i = 1; $i <= $jumlah_halaman; $i++) {
                                ?>
                                <a href="?id=<?php echo $id_produk ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                                <?php
                                }

                                ?>



                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="review-page-title">Write Your Review</h3>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                        <div class="li-review-product">
                                                            <img width="50%"
                                                                src="foto_produk/<?php echo $detail['foto_produk']; ?>">
                                                            <div class="li-review-product-desc">
                                                                <p class="li-product-name">
                                                                    <?php echo $detail['nama_produk']; ?></p>
                                                                <p>
                                                                    <span><?php echo $detail['deskripsi_produk']; ?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Your Feedback</h3>
                                                                    <form action="pages/feedback.php" method="POST">
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Your Review</label>
                                                                            <textarea id="feedback" name="comment"
                                                                                cols="45" rows="8" aria-required="true"
                                                                                required></textarea>
                                                                        </p>
                                                                        <input type="hidden" name="idpelanggan"
                                                                            value="<?php echo $_SESSION['pelanggan']['id_pelanggan'] ?>"
                                                                            required>
                                                                        <input type="hidden" name="idproduk"
                                                                            value="<?php echo $detail['id_produk'] ?>"
                                                                            required>
                                                                        <input type="hidden" name="idpembelian"
                                                                            value="<?php echo $_GET['pembelian'] ?>"
                                                                            required>
                                                                        <p class="your-opinion">
                                                                            <label for='value'>Your Rating</label>
                                                                            <span>
                                                                                <select class="star-rating" id="value"
                                                                                    name="value" required>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                            <div class="feedback-btn pb-15">
                                                                                <button class="btn"
                                                                                    style="background-color: black; color:white;"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">Close</button>
                                                                                <!-- <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a> -->
                                                                                <button class="btn"
                                                                                    style="background-color: black; color:white;"
                                                                                    name="submit">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->

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
        </div>
        <!-- Quick View | Modal Area End Here -->
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

<!-- single-product31:32-->

</html>