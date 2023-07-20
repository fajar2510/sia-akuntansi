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
                    <h4 class="page-title pull-left">Add User</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="user.php">Data Master</a></li>
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
                                <div>
                                    <h4 class="header-title">Input data User</h4>
                                    <p class="text-muted font-14 mb-4">Isikan data sesuai dengan data Anda, dan perhatikan role Anda</p>
                                    <form class="" action="update_user.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama</label>
                                            <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                                            <input class="form-control" type="text" value="<?php echo $data['Nama'] ?>" id="example-text-input" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Username</label>
                                            <input class="form-control" type="text" value="<?php echo $data['Username'] ?>" id="example-text-input" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="">Password</label>
                                            <input type="password" class="form-control" id="inputPassword" value="<?php echo $data['Password'] ?>" placeholder="Password" name="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Jenis Kelamin</label>
                                            <select class="custom-select" required name="gender">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <?php if ($data[gender] == 'Laki-laki') {
                                                    ?>
                                                    <option value="Laki-laki" selected>Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                <?php
                                                } else {
                                                    ?>
                                                    <option value="Perempuan" selected>Perempuan</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Role</label>
                                            <select name="role" class="form-control select2" style="width: 40%;">
                                                <option value="">Select Role</option>
                                                <?php foreach ($dj->result() as $r) : ?>
                                                    <option value="<?php echo $r->id; ?>" <?php if ($r->id == $d['id_location']) { ?> selected="selected" <?php } ?>><?php echo $r->role_id; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Unggah Foto Profil <small>( opsional )</small></label>
                                            <img src="assets/images/foto/<?php echo $data['foto'] ?>" width="50" height="50">
                                            <input type="file" name="foto" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="simpan" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                            <button type="button" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                            <button type="button" class="btn btn-danger mb-3" value="Go Back" onclick="history.back(-1)"> Batal </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Textual inputs end -->
                    </div>
                </div>
                <!-- margin footer -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- main content area end -->
<?php include "footer.php"; ?>