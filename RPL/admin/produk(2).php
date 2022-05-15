<h2>Data Buku</h2>


<div style="color: white;
padding: 15px 10px 5px 50px;
float: right;
font-size: 16px;"><a href="index.php?hal=tambahproduk" class="btn btn-primary">Tambah Data</a>
</div>


<table class="table table-bordered">
	<thead>

		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga (Rp)</th>
			<th>Berat (Gr)</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query(" SELECT * FROM produk"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td> <?php echo $nomor; ?></td>
			<td> <?php echo $pecah['nama_produk']; ?> </td>
			<td> <?php echo $pecah['harga_produk']; ?></td>
			<td> <?php echo $pecah['berat_produk']; ?></td>
			<td> <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100"></td>
			<td>
				<a href="index.php?hal=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-warning btn">Ubah</a>
				<a href="index.php?hal=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
			</td>
		</tr>
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
</table>


