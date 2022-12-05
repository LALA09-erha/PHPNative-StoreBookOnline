<?php
include "../database/koneksi.php";

session_start();
$delete = $koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
if ($delete) {
	$_SESSION['pesan'] = 'Pelanggan berhasil dihapus';
	echo "<script>location='index.php?hal=pelanggan';</script>";
}