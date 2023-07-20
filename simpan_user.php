<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "user";


$nama                        = $_POST['nama'];
$username                    = $_POST['username'];
$pwd                         = $_POST['pwd'];
$gender                      = $_POST['gender'];
$role                        = $_POST['role'];

$ekstensi_diperbolehkan  = array('png', 'jpg');
$foto      = $_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
  if ($ukuran < 2044070) {
    move_uploaded_file($file_tmp, 'assets/images/foto/' . $foto);
    $query = mysqli_query($connect, "INSERT INTO $table (id_role,Nama,Username,Password,gender,foto)
                    VALUES('$role','$nama', '$username','$pwd','$gender','$foto')");
    if ($query) {
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
