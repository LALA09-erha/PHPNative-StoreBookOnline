<h2>Ubah Pelanggan</h2>

<?php  

	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id];'");
	$pecah = $ambil-> fetch_assoc();

	echo"<pre>";
		print_r($pecah);
	echo "</pre>";

?>

<form method="post">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password" value="<?php echo $pecah['password_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Gmail</label>
		<input type="text" class="form-control" name="gmail" value="<?php echo $pecah['gmail_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
	if (isset($_POST['ubah'])) {
		$koneksi->query("UPDATE pelanggan SET gmail_pelanggan='$_POST[gmail]', password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");
	

	echo "<script> aler('Pelanggan Terubah'); </script>";
	echo "<script> location='index.php?hal=pelanggan'; </script>";

	}
?>
