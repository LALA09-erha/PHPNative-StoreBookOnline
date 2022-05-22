<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['idpelanggan'];
    $id_produk = $_POST['idproduk'];
    $komen = $_POST['comment'];
    $value = $_POST['value'];
    echo $id_pelanggan;
    echo $id_produk;
    echo $komen;
    echo $value;
    #masukkan data ke database feedback
    $query = "INSERT INTO rating (id_pelanggan, id_produk, nilai) VALUES ('$id_pelanggan', '$id_produk', '$value')";
    $result = $koneksi->query($query);
    // #masukkan data ke database koment
    $queryy = "INSERT INTO komen (id_pelanggan, id_produk, komen,nilai) VALUES ('$id_pelanggan', '$id_produk', '$komen','$value')";
    $resultt = $koneksi->query($queryy);
    if ($result && $resultt) {
        $_SESSION['pesan'] = "Berhasil mengirim feedback";
        header("location: ../detail.php?id=$id_produk");
    } else {
        $_SESSION['pesan'] = "Gagal mengirim feedback";
        header("location: ../detail.php?id=$id_produk");
    }
}