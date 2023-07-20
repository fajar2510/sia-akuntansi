<?php
$nama_user = $_SESSION['Nama'];
$level = $_SESSION['level'];
$foto = $_SESSION['foto'];

?>

<div class="col-sm-6 clearfix">
    <div class="user-profile pull-right">
        <img class="avatar user-thumb" src="assets/images/foto/<?= $foto; ?>" alt="profil">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <?= $nama_user ?> <i class="fa fa-angle-down"></i></h4>
        <div class="dropdown-menu">
            <a onclick="return confirm" data-toggle="modal" data-target="#logout" class="dropdown-item" href="logout.php">Log Out</a>
        </div>
    </div>
</div>
<!-- Modal -->
<form action="logout.php" method="post">
    <div class="modal fade" id="logout">
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
                    <p>Anda akan keluar Aplikasi ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</form>