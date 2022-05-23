<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "tokobuku");
if (isset($_POST['submit'])) {
    $id_pembelian = $_POST['idpembelian'];
    $id_pelanggan = $_POST['idpelanggan'];
    $id_produk = $_POST['idproduk'];
    $komen = $_POST['comment'];
    $value = $_POST['value'];
    // echo $id_pelanggan;
    // echo $id_pembelian;
    // echo $id_produk;
    // echo $komen;
    // echo $value;

    #cek apakah ada data di database jika ada akan kembali ke halaman detail
    $ambil = $koneksi->query("SELECT * FROM komen WHERE id_komen='$id_pembelian'");
    $numrow = mysqli_num_rows($ambil);
    if ($numrow == 0) {
        $query = "INSERT INTO rating (id_rating,id_pelanggan, id_produk, nilai) VALUES ('$id_pembelian','$id_pelanggan', '$id_produk', '$value')";
        $result = $koneksi->query($query);
        $queryy = "INSERT INTO komen (id_komen,id_pelanggan, id_produk, komen,nilai) VALUES ('$id_pembelian','$id_pelanggan', '$id_produk', '$komen','$value')";
        $resultt = $koneksi->query($queryy);
        $sql = mysqli_query($koneksi, "SELECT * FROM rating WHERE id_produk='$id_produk'");
        $jumlahh = mysqli_num_rows($sql);
        $total = 0;
        while ($data = mysqli_fetch_array($sql)) {
            $total = $total + $data['nilai'];
        }
        $rata = $total / $jumlahh;
        echo $rata;
        $sql = mysqli_query($koneksi, "UPDATE produk SET rating_produk='$rata' WHERE id_produk='$id_produk'");
        // #masukkan data ke database koment
        $_SESSION['pesan'] = "Berhasil mengirim feedback";
        header("location: ../detail.php?id=$id_produk");
    } else {

        $_SESSION['pesan'] = "Gagal mengirim feedback";
        header("location: ../detail.php?id=$id_produk");
    }
}