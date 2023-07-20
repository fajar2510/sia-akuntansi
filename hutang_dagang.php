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
                    <h4 class="page-title pull-left">Daftar Hutang Dagang</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="hutang_dagang.php">Data</a></li>
                        <li><span>Hutang Dagang</span></li>
                    </ul>
                </div>
                <?php include "jam.php"; ?>
            </div>
            <?php include "author.php"; ?>
        </div>
    </div>
    <!-- page title area end -->

    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Data Hutang Dagang</h4>
                        <div class="data-tables datatable-dark">
                            <table id="dataTable3" class="text-left table-hover table-sm" width="100%">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th width="15%">Tanggal</th>
                                        <th width="15%">No. Hutang Dagang</th>
                                        <th width="25%">Keterangan</th>
                                        <th width="15%">Harga</th>
                                        <th width="15%">Jumlah</th>
                                        <th width="30%">Total Hutang</th>
                                        <!-- <th width="20%">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    include "connection/connection.php";
                                    // jalankan query
                                    $tglA = $_GET['tglA'];
                                    $tglB = $_GET['tglB'];

                                    $result = mysqli_query($connect, "SELECT * FROM hutang_dagang  INNER JOIN barang ON hutang_dagang.id_barang=barang.id_barang
                                                        ORDER BY hutang_dagang.kode_hutang_dagang, hutang_dagang.tanggal ASC");
                                    // tampilkan query
                                    $no = 1;
                                    while ($rows = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td class="center"><?php echo $rows['tanggal']; ?></td>
                                            <td class="center"><?php echo $rows['kode_hutang_dagang']; ?></td>
                                            <td class="center"><?php echo $rows['keterangan']; ?><?php echo $rows['nama_barang']; ?></td>
                                            <td class="center"><?php echo $rows['harga']; ?></td>
                                            <td class="center"><?php echo $rows['jumlah']; ?></td>
                                            <td class="center"><?php echo $rows['total']; ?></td>
                                            <!-- <td>
                                                    <button type="submit" data-id="<?php echo $row->id_hutang_dagang; ?>" class="btn btn-success btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#lunasi"><i class="ti-check"></i> </button>
                                                </td> -->
                                        </tr>
                                        <?php
                                        $no++;
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
<!-- Button trigger modal -->

<!-- Modal -->
<form action="hapus_hutang_dagang.php" method="post">
    <div class="modal fade" id="lunasi">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <div class="modal-body">
                        <input type="hidden" name="bookId" id="bookId" />
                    </div>

                </div>
                <div class="modal-body">
                    <p>Anda ingin menyelesaikan Hutang Dagang? Data pada pelunasan terhadap hutang akan ditambahkan . Lunasi ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lunasi</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
<!-- main content area end -->

<?php include "footer.php"; ?>