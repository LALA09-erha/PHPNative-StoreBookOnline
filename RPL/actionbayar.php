<?php
include "database/koneksi.php";

session_start();
// $koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (!isset($_SESSION['pelanggan'])) {
    header("location:login.php");
}
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambill = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan='$id_pelanggan'");
#cek apakah ada produk di keranjang belanja ambil
$check = $ambill->num_rows;
#jika tidak ada produk di keranjang belanja maka akan di larikan ke halaman belanja
if ($check < 1) {
    $_SESSION['pesan'] = "Keranjang Belanja Kosong, Silahkan Belanja";
    header("location:index.php");
}

    if (isset($_POST['bayar'])) {
        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
        $id_kurir = $_POST['id_kurir'];
        $tanggal_pembelian = date('Y-m-d');
        $alamat_pengiriman = $_POST['alamat_pengiriman'];

        $ambil = $koneksi->query("SELECT * FROM kurir WHERE id_kurir='$id_kurir'");
        $arraykurir = $ambil->fetch_assoc();
        $nama_kurir = $arraykurir['nama_kurir'];
        $kurir = $arraykurir['tarif'];

        $total_pembelian = $totalbelanja + $kurir;

        //1. Menyimpan data ke tabel pembelian

        //menyimpan

        #mengambil data dari keranjang belanja
        $ambil = $koneksi->query("SELECT * FROM keranjang JOIN produk on keranjang.id_produk=produk.id_produk WHERE id_pelanggan='$id_pelanggan'");
        while ($array = $ambil->fetch_assoc()) {
            $jumlahh = $array['jumlah'];
            $stokk = $array['stok_produk'];
            #cek stok produk apakah sudah habis
            if ($stokk < $jumlahh) {
                $_SESSION['pesan'] = "Stok produk tidak mencukupi,Silahkan Perbaharui Keranjang";
                echo "<script>location='keranjang.php';</script>";
                exit();
            }
        }

        $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_kurir,tanggal_pembelian,total_pembelian, nama_kurir,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_kurir', '$tanggal_pembelian',
                        '$total_pembelian','$nama_kurir','$kurir','$alamat_pengiriman')");
        //2. Menyimpan data pembelian ke tabel pembelian produk
        //mendapatkan id pembelian barusan terjadi
        $id_pembelian_barusan = $koneksi->insert_id;
        $ambilll = $koneksi->query("SELECT * FROM keranjang JOIN produk on keranjang.id_produk=produk.id_produk WHERE id_pelanggan='$id_pelanggan'");
        while ($arrayy = $ambilll->fetch_assoc()) {
            $id_produk = $arrayy['id_produk'];
            $jumlah = $arrayy['jumlah'];
            $stok = $arrayy['stok_produk'];
            $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah_pembelian) VALUES ('$id_pembelian_barusan','$id_produk', '$jumlah') ");
        }
        // $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,harga,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$harga','$subharga')");
        $koneksi->query("UPDATE produk SET stok_produk=$stok-$jumlah WHERE id_produk = '$id_produk'");
        #mengkosongkan keranjang belanja 
        $koneksi->query("DELETE FROM keranjang WHERE id_pelanggan='$id_pelanggan'");


        //tampilan dialihkan kehalaman nota, nota pembelian barusan
        $_SESSION['pesan'] = "Pembelian Berhasil";
        echo "<script> location='nota.php?id=$id_pembelian_barusan'; </script>";
    }


?>