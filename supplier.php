<?php include "header_navigation.php"; ?>
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
                    <h4 class="page-title pull-left">Add Supplier</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="supplier.php">Data Master</a></li>
                        <li><span>Supplier</span></li>
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
                                <h4 class="header-title">Input data Supplier</h4>
                                <p class="text-muted font-14 mb-4">Isikan data supplier toko anda</p>
                                <form class="" action="simpan_supplier.php" method="post">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Nama Supplier</label>
                                        <input class="form-control" required type="text" value="" id="example-text-input" name="nama_supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-tel-input" class="col-form-label">Kontak</label>
                                        <input class="form-control" required type="tel" value="" id="example-tel-input" placeholder="+6281008xxxx" name="kontak">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg" class="col-form-label">Alamat</label>
                                        <input class="form-control form-control-lg" type="text" placeholder="Jln.Wonokromo xxx" id="example-text-input-lg" name="alamat">
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

                                <h4 class="header-title">Data Supplier</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-left table table-hover table-sm" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Name Supplier</th>
                                                <th>Kontak</th>
                                                <th>Alamat</th>
                                                <th width="20%">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "connection/connection.php";
                                            // jalankan query
                                            $result = mysqli_query($connect, "SELECT * FROM supplier ");

                                            // tampilkan query
                                            while ($row = mysqli_fetch_object($result)) {

                                                ?>
                                                <tr>
                                                    <td><?= $row->nama_supplier ?></td>
                                                    <td><?= $row->kontak ?></td>
                                                    <td><?= $row->alamat ?></td>
                                                    <td>
                                                        <button type="submit" data-id="<?php echo $row->id_supplier; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                                        &nbsp;
                                                        <a class="btn btn-warning btn-flat btn-sm mt-3" href="edit_supplier.php?id=<?= $row->id_supplier ?>"><i class="ti-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
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

<!-- Modal -->
<form action="hapus_supplier.php" method="post">
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