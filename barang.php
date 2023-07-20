<?php
@session_start();
include "connection/connection.php";

$nama_user = $_SESSION['Nama'];

if (@$_SESSION['status'] != "login") {
    header("location:index.php");
}

$sql = "SELECT max(kode_barang) FROM barang";
$query = mysqli_query($connect, $sql);

$kode_barang = mysqli_fetch_array($query);

if ($kode_barang) {
    $nilai = substr($kode_barang[0], 1);
    $kode = (int)$nilai;

    //tambahkan sebanyak + 1
    $kode = $kode + 1;
    $auto_kode = "F" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
    $auto_kode = "F0001";
}
?>

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
                    <h4 class="page-title pull-left">Add Barang</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="barang.php">Data Master</a></li>
                        <li><span>Barang</span></li>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Lihat Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <h4 class="header-title">Data Barang</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table table-hover table-sm" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th width>Kode Barang</th>
                                                <th width>Nama Barang</th>
                                                <th width>Gambar Produk</th>
                                                <th width>Harga Beli</th>
                                                <th width>Harga Jual</th>
                                                <th width>Keuntungan</th>
                                                <th width="15%">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "connection/connection.php";
                                            // jalankan query
                                            $result = mysqli_query($connect, "SELECT * FROM barang ");
                                            // tampilkan query
                                            while ($row = mysqli_fetch_object($result)) {

                                                ?>
                                                <tr>
                                                    <td><?= $row->kode_barang ?></td>
                                                    <td><?= $row->nama_barang ?></td>
                                                    <td><img src="assets/images/gambar_produk/<?= $row->foto  ?>" class="img-circle" width="55px" height="85px" /></td>
                                                    <td><?= $row->harga_beli ?></td>
                                                    <td><?= $row->harga_jual ?></td>
                                                    <td><?= $row->keuntungan ?></td>
                                                    <td>
                                                        <button type="submit" data-id="<?php echo $row->id_barang; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                                        &nbsp;
                                                        <a class="btn btn-warning btn-flat btn-sm mt-3" href="edit_barang.php?id=<?= $row->id_barang ?>"><i class="ti-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="col-lg-6 col-ml-6">
                                    <div class="row">
                                        <!-- Textual inputs start -->
                                        <div class="col-12 mt-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="header-title">Input data Barang</h4>
                                                    <p class="text-muted font-14 mb-4">Isikan data pembelian barang</p>
                                                    <form class="" action="simpan_barang.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Kode Barang</label>
                                                            <input class="form-control" type="text" value="<?php echo $auto_kode; ?>" readonly id="kode_barang" name="kode_barang">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-form-label">Nama Barang</label>
                                                            <input class="form-control" required type="text" value="" id="nama_barang" name="nama_barang">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Unggah Gambar Produk <small>( opsional )</small></label>
                                                            <input type="file" name="foto" class="form-control">
                                                            <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-number-input" class="col-form-label">Harga Beli</label>
                                                            <input class="form-control" required onkeyup="keuntungan();" type="number" min="0" value="" id="harga_beli" name="harga_beli">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-number-input" class="col-form-label">Harga Jual</label>
                                                            <input class="form-control" required onkeyup="keuntungan();" type="number" min="0" value="" id="harga_jual" name="harga_jual">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-number-input" class="col-form-label">Keuntungan</label>
                                                            <input class="form-control" readonly type="number" min="0" value="" id="keuntungan" name="keuntungan">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                                            <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main content area end -->


                    <!-- Modal -->
                    <form action="hapus_barang.php" method="post">
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
                                        <p>Apakah anda yakin ingin menghapus data ?</p>
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


                <?php include "footer.php"; ?>