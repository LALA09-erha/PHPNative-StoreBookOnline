
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
                    <p class="mb-4">Data Produk ini berisikan produk buku-buku yang sebelumnya admin tambahkan.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Harga</th>
                                            <th>Berat(gr)</th>
                                            <th>Gambar</th>                                            
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
                                                <a data-toggle="modal" data-target="#modalhapus" class="btn-danger btn">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $nomor++ ?>
                                        <div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this data?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" below if you are ready to delete your data.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="index.php?hal=hapusproduk&id=<?php echo $pecah['id_produk']; ?>">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                