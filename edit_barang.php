<?php
include "connection/connection.php";
$id = $_GET['id'];


$query_mysql = mysqli_query($connect, "SELECT * FROM barang WHERE id_barang='$id'");
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
                    <h4 class="page-title pull-left">Add Barang</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="barang.php">Data Master</a></li>
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
                                <h4 class="header-title">Input data Barang</h4>
                                <p class="text-muted font-14 mb-4">Isikan data pembelian barang</p>
                                <form class="" action="update_barang.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Kode Barang</label>
                                        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                        <input class="form-control" type="text" readonly value="<?php echo $data['kode_barang']; ?>" id="example-text-input" name="kode_barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Nama Barang</label>
                                        <input class="form-control" type="text" value="<?php echo $data['nama_barang']; ?>" id="example-text-input" name="nama_barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unggah Gambar Produk<small>( opsional )</small></label>
                                        <img src="assets/images/gambar_produk/<?php echo $data['foto'] ?>" width="50" height="50">
                                        <input type="file" name="foto" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="example-number-input" class="col-form-label">Harga Beli</label>
                                        <input class="form-control" onkeyup="keuntungan();" type="number" min="0" value="<?php echo $data['harga_beli']; ?>" id="harga_beli" name="harga_beli">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-number-input" class="col-form-label">Harga Jual</label>
                                        <input class="form-control" onkeyup="keuntungan();" type="number" min="0" value="<?php echo $data['harga_jual']; ?>" id="harga_jual" name="harga_jual">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-number-input" class="col-form-label">Keuntungan</label>
                                        <input class="form-control" readonly type="number" min="0" value="<?php echo $data['keuntungan']; ?>" id="keuntungan" name="keuntungan">
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
<!-- main content area end -->
<?php include "footer.php"; ?>