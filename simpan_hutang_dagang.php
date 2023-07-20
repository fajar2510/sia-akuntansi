<?php
include "connection/connection.php";

$tahun      = date("Y");
$table      = "hutang_dagang";

$tanggal        = $_POST['tanggal'];
$akun           = $_POST['akun'];
$keterangan     = $_POST['keterangan'];
$nominal        = $_POST['nominal'];
$saldo          = $_POST['saldo'];
$status         = $_POST['status'];

$simpan      = "INSERT INTO $table (tanggal,id_akun,keterangan,nominal,id_saldo,id_status)
                    VALUES('$tanggal','$akun','$keterangan','$nominal','$saldo','$status')";
mysqli_query($connect, $simpan);
echo "<script language='javascript'>document.location.href='hutang_dagang.php'</script>";
