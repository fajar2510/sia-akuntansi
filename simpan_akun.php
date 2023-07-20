<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "akun";

$kode_akun       = $_POST['kode_akun'];
$nama_akun   = $_POST['nama_akun'];
$status        = $_POST['status'];
$posisi        = $_POST['posisi'];

$simpan      = "INSERT INTO $table (kode_akun,nama_akun,status,posisi)
                    VALUES('$kode_akun','$nama_akun','$status','$posisi')";
mysqli_query($connect, $simpan);
echo "<script language='javascript'>document.location.href='akun.php'</script>";
