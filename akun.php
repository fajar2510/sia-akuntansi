<?php include "header_navigation.php"; ?>

<!-- sidebar menu area end -->
<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">
                </ul>
            </div>
        </div>
    </div>
    <!-- header area end -->
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Add Akun</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="akun.php">Data Master</a></li>
                        <li><span>Akun</span></li>
                    </ul>
                </div>
                <?php include "jam.php"; ?>
            </div>
            <?php include "author.php"; ?>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-4 col-ml-4">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Input data Akun</h4>
                                <p class="text-muted font-14 mb-4">Isikan data sesuai dengan data akun</p>
                                <form class="" action="simpan_akun.php" method="post">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Kode Akun</label>
                                        <input class="form-control" required type="text" value="" id="kode_akun" name="kode_akun">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text input" class="col-form-label">Nama Akun</label>
                                        <input class="form-control" required type="text" value="" id="example-text-input" name="nama_akun">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="custom-select" required name="status">
                                            <option value="">Pilih Status</option>
                                            <option value="Debit">Debit</option>
                                            <option value="Kredit">Kredit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="custom-select" required name="posisi">
                                            <option value="">Pilih Posisi</option>
                                            <option value="Aktiva">Aktiva</option>
                                            <option value="Pasiva">Pasiva</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                        <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Textual inputs end -->
                </div>
            </div>
            <div class="col-lg-8 col-ml-8">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Data Akun</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-left table-hover table-sm" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Kode Akun</th>
                                                <th>Nama Akun</th>
                                                <th>Status</th>
                                                <th>Posisi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include "connection/connection.php";
                                        // jalankan query
                                        $result = mysqli_query($connect, "SELECT * FROM akun ");

                                        // tampilkan query
                                        while ($row = mysqli_fetch_object($result)) {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $row->kode_akun ?></td>
                                                    <td><?= $row->nama_akun ?></td>
                                                    <td><?= $row->status ?></td>
                                                    <td><?= $row->posisi ?></td>
                                                    <td>
                                                        <button type="submit" data-id="<?php echo $row->id_akun; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                                        &nbsp;
                                                        <a class="btn btn-warning btn-flat btn-sm mt-3" href="edit_akun.php?id=<?= $row->id_akun ?>"><i class="ti-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<form action="hapus_akun.php" method="post">
    <div class="modal fade" id="exampleModalLong">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <div class="modal-body">
                        <input type="hidden" name="bookId" id="bookId" />
                    </div>

                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
<!-- main content area end -->

<?php include "footer.php"; ?>