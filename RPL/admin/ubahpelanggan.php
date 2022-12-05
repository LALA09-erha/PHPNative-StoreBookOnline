<h2>Ubah Pelanggan</h2>

<?php
include "../database/koneksi.php";

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id];'");
$pecah = $ambil->fetch_assoc();
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
    #cek jika tidak ada perubahan yang terjadi 
    if ($_POST['nama'] == $pecah['nama_pelanggan'] && $_POST['password'] == $pecah['password_pelanggan'] && $_POST['gmail'] == $pecah['gmail_pelanggan'] && $_POST['telepon'] == $pecah['telepon_pelanggan']) {
        #tampilkan pesan session sukses
        $_SESSION['pesan'] = 'Pelanggan tidak diubah';
        echo "<script>location='index.php?halaman=pelanggan';</script>";
        // echo "<script>alert('Tidak ada perubahan data');</script>";
        // echo "<script>location='index.php?hal=pelanggan';</script>";
    } else {
        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', password_pelanggan='$_POST[password]', gmail_pelanggan='$_POST[gmail]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]';");
        $_SESSION['pesan'] = 'Pelanggan sukses diubah';
        // echo "<script>alert('Data pelanggan telah diubah');</script>";
        echo "<script>location='index.php?hal=pelanggan';</script>";
    }
    // $koneksi->query("UPDATE pelanggan SET gmail_pelanggan='$_POST[gmail]', password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");


    // echo "<script> aler('Pelanggan Terubah'); </script>";
    // echo "<script> location='index.php?hal=pelanggan'; </script>";
}
?>