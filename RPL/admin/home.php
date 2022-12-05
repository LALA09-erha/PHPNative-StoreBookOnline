<?php
include "../database/koneksi.php";

// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
?>
<h2>Selamat Datang Admin <?php echo $_SESSION['admin']['nama_lengkap']; ?></h2>

<div class="row">
    <?php
    #menghitung jumlah pelanggan 
    $sql = $koneksi->query("SELECT * FROM pelanggan");
    $pelanggan = $sql->num_rows;
    ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelanggan ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <?php
    #menghitung jumlah buku
    $sql = $koneksi->query("SELECT * FROM produk");
    $buku = $sql->num_rows;
    ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $buku ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

    <?php
    #menghitung jumlah transaksi
    $sql = $koneksi->query("SELECT * FROM pembelian");
    $transaksi = $sql->num_rows;
    ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Transaksi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $transaksi ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <?php
    #menghitung jumlah pembelian produk yang belum dibayar
    $sql = $koneksi->query("SELECT * FROM pembelian WHERE status_pembelian='Proses' or status_pembelian='Tertunda'");
    $pembelian = $sql->num_rows;
    ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Transaksi Tertunda</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembelian ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>