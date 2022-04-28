<h2>Data Pembayaran</h2>

<?php 
// mendapatkan id di url
$id_pembelian = $_GET['id'];

// mengambil data
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
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
		</table>
	</div>
	<div class="col-md-6">
		<img src="../bukti_pembayaran/<?php echo $pecah['bukti']; ?>" class="img-responsive" >
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>No Resi Pengiriman</label>
		<input type="text" name="resi" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status" required="">
			<option>Pilih Status</option>
			<option value="Lunas (Barang Terkirim)">Lunas (Barang Terkirim)</option>
			<option value="Batal (Jumlah Duit Tidak Sesuai)">Batal (Jumlah Duit Tidak Sesuai)</option>
		</select>
	</div>
	<button class="btn btn-primary" name="kirim">Kirim</button>
</form>

<?php 

	if (isset($_POST['kirim'])) {
		$resi = $_POST['resi'];
		$status = $_POST['status'];
		$koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = '$id_pembelian'");

		echo "<script> alert('Data Terupdate'); </script>";
		echo "<script> location='index.php?hal=pembeli'; </script>";
	}
?>