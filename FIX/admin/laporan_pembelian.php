<?php

	$semuadata=array(); 
	$mulai="-";
	$selesai="-";
	if (isset($_POST['lihat'])) {
		$mulai = $_POST['tglm'];
		$selesai = $_POST['tgls'];
		$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$mulai' AND '$selesai'");
		while($pecah = $ambil->fetch_assoc()) {
			$semuadata[] = $pecah;
		}
		// echo "<pre>";
		// print_r($semuadata);
		// echo "</pre>";
	}

?>

<h2>Laporan Pembelian</h2>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" value="<?php echo $mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" value="<?php echo $selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>

<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<?php $total=0; ?>
	<?php foreach ($semuadata as $key => $value): ?>
	<?php $total+=$value['total_pembelian']; ?>

	<tbody>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_pelanggan']; ?></td>
			<td><?php echo $value['tanggal_pembelian']; ?></td>
			<td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
			<td><?php echo $value['status_pembelian']; ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>

	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>