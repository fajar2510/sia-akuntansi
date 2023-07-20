<?php
// koneksi database
include "connection/connection.php";

// menangkap data yang di kirim dari form
$id = $_POST['id_modal'];
$table      = "modal";
$tableJ     = "jurnal_umum";

$kode_modal     = $_POST['kode_modal'];
$tanggal        = $_POST['tanggal'];
$akun           = $_POST['akun'];
$keterangan_kas = $_POST['keterangan_kas'];
$nominal        = $_POST['nominal'];


$update      = mysqli_query($connect, "UPDATE $table SET kode_modal='$kode_modal',tanggal='$tanggal',id_akun='$akun',keterangan_kas='$keterangan_kas', nominal='$nominal',WHERE kode_modal='$id'");
$updateJ      = mysqli_query($connect, "UPDATE $tableJ SET no_jurnal='$kode_modal',tanggal='$tanggal',keterangan='$keterangan_kas', nominal='$nominal',WHERE no_jurnal='$id'");

// mengalihkan halaman kembali ke index.php
echo "<script language='javascript'>document.location.href='modal.php'</script>";
