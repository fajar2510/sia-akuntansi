<?php
@session_start();
include "connection/connection.php";

$nama_user = $_SESSION['Nama'];

if (@$_SESSION['status'] != "login") {
    header("location:index.php");
}

$sql = "SELECT max(kode_modal) FROM modal";
$query = mysqli_query($connect, $sql);

$kode_modal = mysqli_fetch_array($query);

if ($kode_modal) {
    $nilai = substr($kode_modal[0], 1);
    $kode = (int)$nilai;

    //tambahkan sebanyak + 1
    $kode = $kode + 1;
    $auto_kode = "A" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
    $auto_kode = "A0001";
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
                    <h4 class="page-title pull-left">Add Modal</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Data</a></li>
                        <li><span>Modal</span></li>
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
            <div class="col-lg-12 col-ml-12">



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
                                    <h4 class="header-title">Modal</h4>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="text-justify table table-hover table-sm " width="100%">
                                            <thead class="text-capitalize">
                                                <tr>

                                                    <th width="15%">Tanggal</th>
                                                    <th width="15%">Kode Modal</th>
                                                    <th width="35%">Keterangan</th>
                                                    <th width="25%">Nominal</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include "connection/connection.php";
                                            // jalankan query
                                            $result = mysqli_query($connect, "SELECT * FROM modal  
                                    INNER JOIN akun ON modal.id_akun=akun.id_akun");

                                            // tampilkan query
                                            while ($row = mysqli_fetch_object($result)) {

                                                ?>
                                                <tbody>
                                                    <tr>

                                                        <td><?= $row->tanggal ?></td>
                                                        <td><?= $row->kode_modal ?></td>
                                                        <td><?= $row->keterangan_kas ?></td>
                                                        <td><?= $row->nominal ?></td>
                                                        <td>
                                                            <button type="submit" data-id="<?php echo $row->id_modal; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                        }
                                        ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="col-lg-6 col-ml-6">
                                        <div class="row">
                                            <!-- Textual inputs start -->
                                            <div class="col-12 mt-5">
                                                <div class="card">
                                                    <form role="form" action="simpan_modal.php" method="post">
                                                        <div class="card-body">
                                                            <h4 class="header-title">Input data Modal </h4>
                                                            <p class="text-muted font-14 mb-4">Isikan data Modal anda</p>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Kode Modal</label>
                                                                <input class="form-control" type="text" value="<?php echo $auto_kode; ?>" readonly id="kode_modal" name="kode_modal">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-date-input" class="col-form-label">Tanggal </label>
                                                                <input class="form-control" required type="date" value="" id="tanggal" name="tanggal">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label">Akun</label>
                                                                <select class="custom-select" required name="akun">
                                                                    <option value="">Pilih Akun</option>
                                                                    <?php
                                                                    include "connection/connection.php";
                                                                    $Q = mysqli_query($connect, "SELECT * FROM akun ORDER BY id_akun ASC");
                                                                    while ($r = mysqli_fetch_array($Q)) {
                                                                        echo "<option value='$r[id_akun]'>$r[nama_akun]</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text input" class="col-form-label">Keterangan</label>
                                                                <input class="form-control" type="text" required value="" id="keterangan " name="keterangan_kas">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-number-input" class="col-form-label">Nominal </label>
                                                                <input class="form-control" onkeyup="total();" type="number" min="0" value="" id="harga" name="nominal">
                                                            </div>
                                                            <!-- tombol  -->
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                                                <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                                            </div>
                                                        </div>
                                                </div>
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
            <!-- Modal -->
            <form action="hapus_modal.php" method="post">
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
                                <p>Peringatan ! Jika anda menghapus data ini , data pada jurnal umum, buku besar ,serta laporan juga akan terhapus . Yakin menghapus ?</p>
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