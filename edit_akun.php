<?php
include "connection/connection.php";
$id = $_GET['id'];


$query_mysql = mysqli_query($connect, "SELECT * FROM akun WHERE akun.id_akun='$id'");
$data = mysqli_fetch_array($query_mysql);
?>

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
                                <form class="" action="update_akun.php" method="post">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Kode Akun</label>
                                        <input type="hidden" name="id_akun" value="<?php echo $data['id_akun']; ?>">
                                        <input class="form-control" required type="text" value="<?php echo $data['kode_akun']; ?>" id="kode_akun" name="kode_akun">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text input" class="col-form-label">Nama Akun</label>
                                        <input class="form-control" required type="text" value="<?php echo $data['nama_akun']; ?>" id="example-text-input" name="nama_akun">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select class="custom-select" required name="status">
                                            <option value="">Pilih Status</option>
                                            <?php if ($data[status] == 'Debit') {
                                                ?>
                                                <option value="Debit" selected>Debit</option>
                                                <option value="Kredit">Kredit</option>
                                            <?php
                                        } else {
                                            ?>
                                                <option value="Kredit" selected>Kredit</option>
                                                <option value="Debit">Debit</option>
                                            <?php
                                        } ?>



                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Posisi</label>
                                        <select class="custom-select" required name="posisi">
                                            <option value="">Pilih Posisi</option>
                                            <?php if ($data[posisi] == 'Aktiva') {
                                                ?>
                                                <option value="Aktiva" selected>Aktiva</option>
                                                <option value="Pasiva">Pasiva</option>
                                                <option value="-">-</option>
                                            <?php
                                        } elseif ($data['posisi'] == 'Pasiva') {
                                            ?>
                                                <option value="Aktiva">Aktiva</option>
                                                <option value="Pasiva" selected>Pasiva</option>
                                                <option value="-">-</option>
                                            <?php
                                        } else { ?>
                                                <option value="Aktiva">Aktiva</option>
                                                <option value="Pasiva">Pasiva</option>
                                                <option value="-" selected>-</option>
                                            <?php
                                        } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                        <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                        <button type="button" class="btn btn-danger mb-3" value="Go Back" onclick="history.back(-1)"> Batal </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Textual inputs end -->
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>
<!-- main content area end -->
<?php include "footer.php"; ?>