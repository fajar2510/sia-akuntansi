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
                                    <form class="" action="simpan_user.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama</label>
                                            <input class="form-control" required type="text" value="" id="example-text-input" name="nama">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" required class="col-form-label">Username</label>
                                            <input class="form-control" type="text" value="" id="example-text-input" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-form-label">Password</label>
                                            <input type="password" required class="form-control" id="inputPassword" value="" placeholder="Password" name="pwd">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Jenis Kelamin</label>
                                            <select class="custom-select" required name="gender">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Role</label>
                                            <select class="custom-select" required name="role">
                                                <option value="">Pilih Role</option>
                                                <?php
                                                include "connection/connection.php";
                                                $Q = mysqli_query($connect, "SELECT * FROM role ORDER BY id_role ASC");
                                                while ($r = mysqli_fetch_array($Q)) {
                                                    if ($data['id_role'] == $r['id_role']) {
                                                        $s = 'selected';
                                                    } else {
                                                        $s = '';
                                                    }
                                                    echo "<option value='$r[id_role]' $s>$r[level]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Unggah Foto Profil <small>( opsional )</small></label>
                                            <input type="file" name="foto" class="form-control">
                                            <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="simpan" class="btn btn-primary mb-3"><i class="ti-save"></i> Simpan</button> &nbsp;
                                            <button type="reset" class="btn btn-dark mb-3"><i class="ti-reload"></i> Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Textual inputs end -->
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-ml-8">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Daftar User</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center table table-hover table-sm" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th width="24%">Nama</th>
                                                <th width="10%">Username</th>
                                                <th width="17%">Foto</th>
                                                <th width="10%">Gender</th>
                                                <th width="12%">Role</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include "connection/connection.php";
                                        // jalankan query
                                        $result = mysqli_query($connect, "SELECT * FROM user INNER JOIN role ON user.id_role=role.id_role");

                                        // tampilkan query
                                        while ($row = mysqli_fetch_object($result)) {

                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $row->Nama ?></td>
                                                    <td><?= $row->Username ?></td>
                                                    <td><img src="assets/images/foto/<?= $row->foto  ?>" class="img-circle" width="60px" height="100px" /></td>
                                                    <td><?= $row->gender ?></td>
                                                    <td><?= $row->level ?></td>
                                                    <td>
                                                        <button type="submit" data-id="<?php echo $row->id_user; ?>" class="btn btn-danger btn-flat btn-sm mt-3 open-AddBookDialog" data-toggle="modal" data-target="#exampleModalLong"><i class="ti-trash"></i> </button>
                                                        &nbsp;
                                                        <a class="btn btn-warning btn-flat btn-sm mt-3" href="edit_user.php?id=<?= $row->id_user ?>"><i class="ti-pencil"></i></a>
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
                    <!-- margin footer -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content area end -->

<!-- Modal -->
<form action="hapus_user.php" method="post">
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

<?php include "footer.php"; ?>