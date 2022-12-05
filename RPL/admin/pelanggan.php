<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
<p class="mb-4">Data pelanggan ini berasal dari user yang sudah mendaftar sebagai pembeli.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../database/koneksi.php";

                    $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td> <?php echo $nomor; ?></td>
                        <td> <?php echo $pecah["nama_pelanggan"]; ?></td>
                        <td> <?php echo $pecah["gmail_pelanggan"]; ?></td>
                        <td> <?php echo $pecah["telepon_pelanggan"]; ?></td>
                        <td>
                            <a href="index.php?hal=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>"
                                class="btn btn-warning">Ubah</a>
                            <a onclick="hapususer(<?php echo $pecah['id_pelanggan']; ?>)"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function hapususer($id) {
    var x = confirm("Apakah anda yakin ingin menghapus data ini?");
    if (x) {
        window.location.href = "index.php?hal=hapuspelanggan&id=" + $id;
    } else {
        return false;
    }
}
</script>