<?php
include "connection/connection.php";
$id = $_GET['id'];


$query_mysql = mysqli_query($connect, "SELECT * FROM supplier WHERE id_supplier='$id'");
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
                    <h4 class="page-title pull-left">Add Supplier</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="supplier.php">Data Master</a></li>
                        <li><span>User</span></li>
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
                                <form class="" action="update_supplier.php" method="post">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Nama Supplier</label>
                                        <input type="hidden" name="id_supplier" value="<?php echo $data['id_supplier']; ?>">
                                        <input class="form-control" type="text" value="<?php echo $data['nama_supplier']; ?>" id="example-text-input" name="nama_supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-tel-input" class="col-form-label">Kontak</label>
                                        <input class="form-control" type="tel" value="<?php echo $data['kontak']; ?>" id="example-tel-input" name="kontak">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input-lg" class="col-form-label">Alamat</label>
                                        <input class="form-control form-control-lg" type="text" value="<?php echo $data['alamat']; ?>" placeholder="Jln.Wonokromo xxx" id="example-text-input-lg" name="alamat">
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