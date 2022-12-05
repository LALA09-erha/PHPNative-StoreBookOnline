<h2>Data Pembayaran</h2>

<?php
include "../database/koneksi.php";

// mendapatkan id di url
$id_pembelian = $_GET['id'];

// mengambil data
$ambil = $koneksi->query("SELECT * FROM pembayaran join pembelian on pembayaran.id_pembelian =pembelian.id_pembelian join kurir on pembelian.id_kurir=kurir.id_kurir  WHERE pembayaran.id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $pecah['nama']; ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $pecah['bank']; ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($pecah['jumlah']); ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $pecah['tanggal']; ?></td>
            </tr>
            <tr>
                <th>Kurir</th>
                <td><?php echo $pecah['nama_kurir']; ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-5">
        <img src="../bukti_pembayaran/<?php echo $pecah['bukti']; ?>" class="img-fluid">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" name="resi" class="form-control" value="<?php echo $pecah['resi_pengiriman']; ?>">
    </div>
    <div class="form-group">
        <label>Status <strong><?php echo $pecah['status_pembelian']; ?></strong></label>
        <select class="form-control" name="status" required="">
            <option value="">Pilih Status</option>
            <?php
            if ($pecah['status_pembelian'] == "Tertunda" || $pecah['status_pembelian'] == "Batal (Jumlah Duit Tidak Sesuai)" || $pecah['status_pembelian'] == "Proses") {
                echo "
     
                <option value='Lunas (Barang Terkirim)'>Lunas (Barang Terkirim)</option>
                <option value='Pending (Barang Terkirim)'>Pending (Barang Terkirim)</option>
                <option value='Selesai(Barang Sudah Sampai)'>Selesai(Barang Sudah Sampai)</option>
				
				";
            } else if ($pecah['status_pembelian'] == "Lunas (Barang Terkirim)" || $pecah['status_pembelian'] == "Pending (Barang Terkirim)") {
                echo "
                <option value='Batal (Jumlah Duit Tidak Sesuai)'>Batal (Jumlah Duit Tidak Sesuai)</option>
                <option value='Selesai(Barang Sudah Sampai)'>Selesai(Barang Sudah Sampai)</option>
            ";
            } else {
                echo "
				<option value='Selesai(Barang Sudah Sampai)'>Selesai(Barang Sudah Sampai)</option>
				
			";
            }
            ?>
            <!-- <option value="Lunas (Barang Terkirim)">Lunas (Barang Terkirim)</option>
            <option value="Batal (Jumlah Duit Tidak Sesuai)">Batal (Jumlah Duit Tidak Sesuai)</option>
            <option value="Selesai(Barang Sudah Sampai)">Selesai(Barang Sudah Sampai)</option> -->
        </select>
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
</form>

<?php

if (isset($_POST['kirim'])) {
    $resi = $_POST['resi'];
    $status = $_POST['status'];

    #cek apakah tidak ada data yang di ubah
    if ($resi == $pecah['resi_pengiriman'] && $status == $pecah['status_pembelian']) {
        $_SESSION['pesan'] = "Data Pembayaran Tidak Diubah";
        echo "<script>location='index.php?hal=pembeli';</script>";
    } else if (strlen($status) < 1) {
        $_SESSION['pesan'] = "Data Pembayaran Tidak Diubah";
        echo "<script>location='index.php?hal=pembeli';</script>";
    } else {
        $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
        $_SESSION['pesan'] = "Data pembayaran berhasil diubah";
        echo "<script>location='index.php?hal=pembeli';</script>";
    }
    // echo "<script>alert('Data pembayaran berhasil diubah');</script>";
    // $koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = '$id_pembelian'");
}
?>