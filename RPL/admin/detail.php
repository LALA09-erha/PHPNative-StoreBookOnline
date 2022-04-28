<h2>Detail Pembelian</h2>

<?php  
	$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail=$ambil->fetch_assoc();

	// echo "<pre>";
	// print_r($detail);
	// echo "</pre>";
?>






				Kode Pembelian : <strong>H-<?php echo $detail['id_pembelian']; ?>-S</strong><br>
				Tanggal Pembelian : <?php echo $detail['tanggal_pembelian']; ?> <br>
				Harga Pembelian : Rp. <?php echo number_format($detail['total_pembelian'])?><br>
				Status Pembelian : <strong><?php echo $detail['status_pembelian']; ?></strong><br>
				<?php if (!empty($detail['resi_pengiriman'])): ?>
							No.Resi : <strong><?php echo $detail['resi_pengiriman']; ?></strong>
							<?php endif  ?>
			<div class="row">
				<div class="col-md-4">

					<h3>Pelanggan</h3>
					<strong><?php echo $detail['nama_pelanggan']?></strong><br>
						Nomor Telepon :  <?php echo $detail['telepon_pelanggan']?><br>Gmail : <?php echo $detail['gmail_pelanggan']; ?>
		
				</div>
				<div class="col-md-4">
					<h3>Pengirim</h3>
					<strong><?php echo $detail['nama_kurir']; ?></strong><br>
				Tarif : Rp. <?php echo number_format($detail['tarif']); ?>
				</div>
				<div class="col-md-4">
					<h3>Alamat Pengiriman</h3>
					<strong><?php echo $detail['alamat_pengiriman']; ?></strong>
				</div>
			</div>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
					</tr>
				</thead>


				<tbody>
					<?php $nomor=1; ?>
					<?php $totalbelanja=0;?>
					<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
					<?php while($pecah=$ambil->fetch_assoc()) { ?>
						<?php $subharga =  $pecah['harga_produk']*$pecah['jumlah_pembelian']; ?>
					<tr>
						<td> <?php echo $nomor; ?></td>
						<td> <?php echo $pecah['nama_produk']; ?></td>
						<td> Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td> <?php echo $pecah['jumlah_pembelian']; ?></td>
						<td> Rp. <?php echo number_format($subharga); ?></td>
					</tr>
					<?php $nomor++ ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php } ?>
				</tbody>


				<tfoot>
					<tr>
						<th colspan="4">Tarif</th>
						<td>Rp. <?php echo number_format($detail['tarif']); ?></td>
					</tr>
					<tr>
						<th colspan="4">TOTAL</th>
						<th>Rp. <?php echo number_format($totalbelanja+$detail['tarif']); ?></th>
					</tr>
				</tfoot>

</table>