<?php
// koneksi database
include "connection/connection.php";

// menangkap data yang di kirim dari form
$id = $_POST['id_akun'];
$table      = "akun";

$kode_akun     = $_POST['kode_akun'];
$nama_akun     = $_POST['nama_akun'];
$status        = $_POST['status'];
$posisi        = $_POST['posisi'];

$update      = mysqli_query($connect, "UPDATE $table SET kode_akun='$kode_akun',nama_akun='$nama_akun',status='$status',posisi='$posisi' WHERE id_akun='$id'");

// mengalihkan halaman kembali ke index.php
echo "<script language='javascript'>document.location.href='akun.php'</script>";
