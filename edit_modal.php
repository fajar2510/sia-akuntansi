<?php
include "connection/connection.php";
$id = $_GET['id'];


$query_mysql = mysqli_query($connect, "SELECT * FROM modal WHERE id_modal='$id'");
$data = mysqli_fetch_array($query_mysql);
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
            </div>
            <?php include "author.php"; ?>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">





                <div class="col-lg-6 col-ml-6">
                    <div class="row">
                        <!-- Textual inputs start -->
                        <div class="col-12 mt-5">
                            <div class="card">
                                <form role="form" action="update_modal.php" method="post">
                                    <div class="card-body">
                                        <h4 class="header-title">Input data Modal </h4>
                                        <p class="text-muted font-14 mb-4">Isikan data Modal anda</p>

                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Tanggal </label>
                                            <input class="form-control" required type="date" value="<?php echo $data['tanggal']; ?>" id="tanggal" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Akun</label>
                                            <select class="custom-select" required name="akun">
                                                <option value="">Pilih Akun</option>
                                                <?php
                                                include "connection/connection.php";
                                                $Q = mysqli_query($connect, "SELECT * FROM akun ORDER BY id_akun ASC");
                                                while ($r = mysqli_fetch_array($Q)) {
                                                    if ($data['id_akun'] == $r['id_akun']) {
                                                        $s = 'selected';
                                                    } else {
                                                        $s = '';
                                                    }
                                                    echo "<option value='$r[id_akun]' $s>$r[nama_akun]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text input" class="col-form-label">Keterangan</label>
                                            <input class="form-control" type="text" required value="<?php echo $data['keterangan_kas']; ?>" id="keterangan " name="keterangan">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-number-input" class="col-form-label">Nominal </label>
                                            <input class="form-control" onkeyup="total();" type="number" min="0" value="<?php echo $data['nominal']; ?>" id="harga" name="nominal">
                                        </div>

                                        <!-- tombol  -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                            <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                            <button type="button" class="btn btn-danger mb-3" value="Go Back" onclick="history.back(-1)"> Batal </button>
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