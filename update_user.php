<?php
// koneksi database
include "connection/connection.php";

// menangkap data yang di kirim dari form
$id = $_POST['id_user'];
$table      = "user";

$nama       = @$_POST[nama];
$username   = @$_POST[username];
$pwd        = @$_POST[pwd];
$role       = @$_POST[role];
$gender     = @$_POST[gender];
$foto       = @$_POST[foto];

$ekstensi_diperbolehkan  = array('png', 'jpg');
$foto      = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 2044070) {
        move_uploaded_file($file_tmp, 'assets/images/foto/' . $foto);
        $update  = mysqli_query($connect, "UPDATE $table SET Nama='$nama',Username='$username',Password='$pwd', id_role='$role',gender='$gender',foto='$foto'  WHERE id_user='$id'");
        if ($update) {
            echo "<script language='javascript'>document.location.href='user.php'</script>";
        } else {
            echo "<script language='javascript'>document.location.href='user.php?pesan=GAGAL UPLOAD'</script>";
        }
    } else {
        echo "<script language='javascript'>document.location.href='user.php?pesan=UKURAN FILE TERLALU BESAR'</script>";
    }
} else {
    echo "<script language='javascript'>document.location.href='user.php?pesan=EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'</script>";
}

// mengalihkan halaman kembali ke index.php
echo "<script language='javascript'>document.location.href='user.php'</script>";
