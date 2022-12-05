<?php
include "database/koneksi.php";

session_start();
// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (!isset($_SESSION['pelanggan'])) {
    header("location:login.php");
}

if (isset($_POST['submit'])) {
    $id = $_POST['submit'];
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
    $data = $koneksi->query("SELECT * FROM wishlist WHERE id_pelanggan='$id_pelanggan' AND id_produk='$id'");
    $cek = $data->num_rows;
    #jika produk sudah ada di wishlist maka tidak akan ditambahkan
    if ($cek > 0) {
        #pesan
        $_SESSION['pesan'] = "Produk Sudah Ada di Wishlist";
        #larikan ke keranjang
        header("location:wishlist.php");
        exit();
    } else {
        #menambahkan produk yang dipilih ke dalam keranjang belanja
        $koneksi->query("INSERT INTO wishlist (id_pelanggan,id_produk) VALUES ('$id_pelanggan','$id')");
        #pesan
        $_SESSION['pesan'] = "Produk Berhasil Ditambahkan";
        #larikan ke keranjang
        header("location:wishlist.php");
        exit();
    }
}
$keyword = $_GET['keyword'];

$semuadata = array();
$ambildata = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' OR kategori LIKE '%$keyword%'");


?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- shop-4-column31:48-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BOS | Pencarian</title>
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
                        <li class="active">Pencarian</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Content Wraper Area -->
        <div class="content-wraper pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Begin Li's Banner Area -->
                        <div class="single-banner shop-page-banner">
                            <h1>Hasil Pencarian</h1>
                        </div>
                        <!-- Li's Banner Area End Here -->
                        <!-- shop-top-bar start -->
                        <div class="shop-top-bar mt-30">
                            <div class="shop-bar-inner">
                                <div class="product-view-mode">
                                    <!-- shop-item-filter-list start -->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active" role="presentation"><a aria-selected="true"
                                                class="active show" data-toggle="tab" role="tab"
                                                aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a>
                                        </li>
                                        <li role="presentation"><a data-toggle="tab" role="tab"
                                                aria-controls="list-view" href="#list-view"><i
                                                    class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <?php
                                $jumlah = $ambildata->num_rows;
                                ?>
                                <div class="toolbar-amount">
                                    <span>Showing 1 to 12 of <?php echo $jumlah; ?></span>
                                </div>
                            </div>
                            <!-- product-select-box start -->

                            <!-- product-select-box end -->
                        </div>
                        <!-- shop-top-bar end -->
                        <!-- shop-products-wrapper start -->
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                    <div class="product-area shop-product-area">
                                        <div class="row ">
                                            <!-- single-product-wrap start -->
                                            <?php
                                            while ($pecah = $ambildata->fetch_assoc()) {
                                                $semuadata[] = $pecah;
                                            }
                                            $jumlahdata = count($semuadata);
                                            $jumlahdatatampil = 8;
                                            $jumlah_halaman = ceil($jumlahdata / $jumlahdatatampil);
                                            $halamanaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                                            $awaldata = ($jumlahdatatampil * $halamanaktif) - $jumlahdatatampil;
                                            $semuadata2 = array();
                                            $ambildata2 = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk like  '%$keyword%' or kategori like  '%$keyword%'  ORDER BY id_produk DESC LIMIT $awaldata, $jumlahdatatampil");
                                            while ($pecah = $ambildata2->fetch_assoc()) {
                                                $semuadata2[] = $pecah;
                                            }
                                            if (empty($semuadata2)) : ?>
                                            <div class="container justify-content-center">
                                                <div class="alert alert-danger text-center">'<?php echo $keyword ?>'
                                                    Tidak Ditemukan</div>
                                            </div>
                                            <?php endif ?>
                                            <?php foreach ($semuadata2 as $key => $value) : ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="detail.php?id=<?php echo $value['id_produk']; ?>">
                                                            <img src="foto_produk/<?php echo $value['foto_produk']; ?>"
                                                                alt="Li's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <p><?php echo $value['kategori']; ?></p>
                                                                </h5>
                                                                <?php
                                                                    $idproduk = $value['id_produk'];
                                                                    #code mengambil rating dari tabel rating dengan id produk
                                                                    $sql2 = mysqli_query($koneksi, "SELECT * FROM rating WHERE id_produk='$idproduk'");
                                                                    $jumlahhh = mysqli_num_rows($sql2);
                                                                    ?>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <?php
                                                                            if ($jumlahhh == 0) {
                                                                                echo '<span>0.0</span> <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>';
                                                                            } else {
                                                                                $totall = 0;
                                                                                while ($dataa = mysqli_fetch_array($sql2)) {
                                                                                    $totall = $totall + $dataa['nilai'];
                                                                                }
                                                                                $rataa = $totall / $jumlahhh;
                                                                                $floorr = floor($rataa);
                                                                                echo "<span>" . round($rataa, 1) . "</span> ";
                                                                                #menerapkan perulangan untuk menampilkan bintang sesuai dengan rating
                                                                                for ($i = 0; $i < 5; $i++) {
                                                                                    #menampilkan bintang setengah jika rating decimal
                                                                                    if ($rataa - $floorr != 0 && $i == $floorr) {
                                                                                        echo '<li><i class="fa fa-star-half-o"></i></li>';
                                                                                    } else if ($floorr > $i) {
                                                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                                                    } else {
                                                                                        echo '<li><i class="fa fa-star-o"></i></li>';
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="detail.php?id=<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?></a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price">Rp.
                                                                    <?php echo number_format($value['harga_produk']); ?></span>
                                                                <span class="new-price">Stok
                                                                    <?php if ($value['stok_produk'] >= 1) {
                                                                            echo $value['stok_produk'];
                                                                        } else {

                                                                            echo "<strong style='color:red'> Habis</strong>";
                                                                        }

                                                                        ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <?php if ($value['stok_produk'] >= 1) : { ?>
                                                                <li class="add-cart active"><a
                                                                        href="beli.php?id=<?php echo $value['id_produk']; ?>">Add
                                                                        to cart</a></li>
                                                                <?php  } ?>
                                                                <?php else : { ?>
                                                                <li class="add-cart active"><a>Habis</a></li>
                                                                <?php } ?>
                                                                <?php endif ?>
                                                                <form action="" method="post" id="wishlist">

                                                                    <li><button class="links-details"
                                                                            style="border: 0px;" name='submit'
                                                                            type="submit" form="wishlist"
                                                                            value="<?php echo $value['id_produk']; ?>"><i
                                                                                class="fa fa-heart-o"></i></button></li>
                                                                </form>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <!-- single-product-wrap end -->

                                        </div>
                                    </div>
                                </div>
                                <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <!-- START LIST ITEM -->

                                            <?php
                                            #pegination code in search page

                                            if (empty($semuadata2)) : ?>
                                            <div class="row d-flex justify-content-center">
                                                <div class="alert alert-danger">'<?php echo $keyword ?>' Tidak Ditemukan
                                                </div>
                                            </div>
                                            <?php endif ?>
                                            <?php foreach ($semuadata2 as $key => $value) : ?>
                                            <div class="row product-layout-list">
                                                <div class="col-lg-3 col-md-5 ">
                                                    <div class="product-image">
                                                        <a href="detail.php?id=<?php echo $value['id_produk']; ?>">
                                                            <img src="foto_produk/<?php echo $value['foto_produk']; ?>"
                                                                alt="Li's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-7">
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a
                                                                        href="product-details.html"><?php echo $value['kategori']; ?></a>
                                                                </h5>
                                                                <?php
                                                                    $id_produkk = $value['id_produk'];
                                                                    #code mengambil rating dari tabel rating dengan id produk
                                                                    $sql = mysqli_query($koneksi, "SELECT * FROM rating WHERE id_produk='$id_produkk'");
                                                                    $jumlahh = mysqli_num_rows($sql);
                                                                    ?>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <?php
                                                                            if ($jumlahh == 0) {
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
                                                                                $rata = $total / $jumlahh;
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
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="detail.php?id=<?php echo $value['id_produk']; ?>"><?php echo $value['nama_produk']; ?></a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price">Rp.
                                                                    <?php echo number_format($value['harga_produk']); ?></span>
                                                                <span class="new-price">Stok
                                                                    <?php if ($value['stok_produk'] >= 1) {
                                                                            echo $value['stok_produk'];
                                                                        } else {
                                                                            echo "<strong style='color:red'>Habis</strong>";
                                                                        }

                                                                        ?>
                                                                </span>
                                                            </div>
                                                            <p><?php echo $value['deskripsi_produk']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="shop-add-action mb-xs-30">
                                                        <ul class="add-actions-link">
                                                            <?php if ($value['stok_produk'] >= 1) : { ?>
                                                            <li class="add-cart"><a
                                                                    href="beli.php?id=<?php echo $value['id_produk']; ?>">Add
                                                                    to cart</a></li>
                                                            <?php  } ?>
                                                            <?php else : { ?>
                                                            <li class="add-cart"><a>Habis</a></li>
                                                            <?php } ?>
                                                            <?php endif ?>
                                                            <form action="" method="post" id="wishlist">

                                                                <li><button class="links-details" style="border: 0px;"
                                                                        name='submit' type="submit" form="wishlist"
                                                                        value="<?php echo $value['id_produk']; ?>"><i
                                                                            class="fa fa-heart-o">Add to
                                                                            Wishlist</i></button></li>
                                                            </form>

                                                            <!-- <li class="add-cart"><a href="#">Add to cart</a></li>
                                                                <li class="wishlist"><a href="wishlist.php"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                               -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <p>Showing 1-8 of <?php echo $jumlah; ?> item(s)</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="pagination-box">
                                                <?php
                                                #pagimation number code with get keyword value                                                    
                                                for ($i = 1; $i <= $jumlah_halaman; $i++) {
                                                    if ($i == $halamanaktif) {
                                                        echo "<li class='active'><a href='?halaman=$i&keyword=$keyword'>$i</a></li>";
                                                    } else {
                                                        echo "<li><a href='?halaman=$i&keyword=$keyword'>$i</a></li>";
                                                    }
                                                }
                                                ?>
                                                <!-- <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wraper Area End Here -->
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
    <script src="js/caca.js"></script>
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